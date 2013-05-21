<?php
class ScanEmail {

    public function scan(Email $email) {

        $message = array();
        $pointCount = 0;

         $clean_msg = ' ' . Email::cleanMessage($email->getMessage()) . ' ';


        //split the message into an array of words
        foreach (preg_split("/\s/", $clean_msg) as $word) {

    	    $message[$word] = 1;
        } 

        //loop through keyword
        foreach($this->getKeywords() as $keyword) {

            $derivatives = array('','er','ing','s','ed','able');
       
            //loop through derivates
            foreach($derivatives as $drv) {

                $keyword_drv = $keyword->name . $drv;

                //if the keyword exists in the message
                if(isset($message[$keyword_drv])) {

                    //increment the points by the count of occurences
                    $pointCount += substr_count($clean_msg,' '.$keyword_drv.' ');

                    $this->createReference($keyword,$email);
                    $tag = $this->buildTag($keyword, $keyword_drv);
                    $clean_msg = str_replace(' '.$keyword_drv.' ',' '.$tag.' ',$clean_msg);
                } 

            }
        }

        if($pointCount) {
            $email->message = $clean_msg;
            $email->points = $pointCount;
            $email->save();
        }
    }

    private function getKeywords() {
    
        return Doctrine_Core::getTable('Keyword')->findAll();
    }

    private function createReference(Keyword $keyword,Email $email) {

        $ek = new EmailKeyword();
        $ek->email_id = $email->id;
        $ek->keyword_id = $keyword->id;
        $ek->save();
    }

    private function buildTag(Keyword $keyword, $literal) {
        $color = $keyword->getFlag()->getColor();
        return '<span title="'.$keyword->getDescription().'" style="color:'.$color.'" >'.$literal.'</span>';
    }
}
