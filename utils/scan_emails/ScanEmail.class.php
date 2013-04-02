<?php
class ScanEmail {

    public function scan(Email $email) {

        $message = array();
        $pointCount = 0;

         $clean_msg = Email::cleanMessage($email->getMessage());

        foreach (preg_split("/\s/", $clean_msg) as $word) {

    	    $message[$word] = 1;
        } 

        foreach($this->getKeywords() as $keyword) {
       
            if(isset($message[$keyword->name])) {
                $pointCount += substr_count($clean_msg,' '.$keyword->name.' ');
                $this->createReference($keyword,$email);
                $tag = $this->buildTag($keyword);
                $clean_msg = str_replace(' '.$keyword->name.' ',' '.$tag.' ',$clean_msg);
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

    private function buildTag(Keyword $keyword) {
        $cssClass = $keyword->getFlag()->getCssClass();
        $color = $keyword->getFlag()->getColor();
        return '<span class="'.$cssClass.'" style="color:'.$color.'" >'.$keyword.'</span>';
    }
}
