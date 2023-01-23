<?php // main site controllers
    namespace api\controllers;

    class SiteController {

        // return true or false for https running
        public function siSSLRunning() {
            if (isset($_SERVER['HTTPS'])) {
                if ($_SERVER['HTTPS'] == 1) {
                    return true;
                } elseif ($_SERVER['HTTPS'] == 'on') {
                    return true;
                }
            }
        
            return false;
        }

        // send api headers
        public function sendAPIHeaders() {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST');
            header("Access-Control-Allow-Headers: X-Requested-With"); 
            header('Content-Type: application/json; charset=utf-8');
        }
    }


?>