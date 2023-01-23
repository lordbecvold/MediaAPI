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

        // get api token from query-string
        public function getAPIToken() {

            global $securityController;

            // check if token is empty
            if (empty($_GET["token"])) {
                $token = null;
            } else {

                // escape token
                $token = $securityController->escapeString($_GET["token"]);
            }

            // return final token value
            return $token;
        }

        // get media type from query-string
        public function getMediaType() {

            global $securityController;

            // check if media is empty
            if (empty($_GET["media"])) {
                $media = null;
            } else {

                // escape media
                $media = $securityController->escapeString($_GET["media"]);
            }

            // return final media value
            return $media;
        }
    }
?>