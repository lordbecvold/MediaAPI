<?php // security utils 
    namespace api\controllers;

    class SecurityController {

        public function escapeString($string) {

            // escape html characters
            $out = htmlspecialchars($string, ENT_QUOTES);
            
            // strip html tags
            $out = strip_tags($out);

            // return final output
            return $out;
        }
    }

?>