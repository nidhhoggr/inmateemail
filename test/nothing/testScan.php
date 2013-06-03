<?php


$clean_msg = <<<EOF
fuck you are fucked you fucking mother fucker who fucks mud puddles go get fucked fuckable
EOF;


        //split the message into an array of words
        foreach (preg_split("/\s/", $clean_msg) as $word) {

            $message[$word] = 1;
        }



$keyword = new stdClass;

$keyword->name = 'fuck';

            $derivatives = array('','er','ing','s','ed','able');

            //loop through derivates
            foreach($derivatives as $drv) {

                $keyword_drv = $keyword->name . $drv;

                //if the keyword exists in the message
                if(isset($message[$keyword_drv])) {

                    //increment the points by the count of occurences
                    $pointCount += substr_count($clean_msg,' '.$keyword_drv.' ');

                    echo $keyword->name.' ' . $keyword_drv. "\r\n";
                    //echo '$tag = $this->buildTag($keyword, $keyword_drv);
                    //$clean_msg = str_replace(' '.$keyword_drv.' ',' '.$tag.' ',$clean_msg);
                }

            }

