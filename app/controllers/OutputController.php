<?php // api output controller
    namespace api\controllers;

    class OutputController {

        public function errorOutput($code, $message) {
            
            global $siteController;
            
            // send api return headers
            $siteController->sendAPIHeaders();

            // send response code
            http_response_code(400);

            // build error json
            $arr = [
                "status" => "error",
                "code" => $code,
                "message" => $message
            ];

            // print json & kill app
            die(json_encode($arr));
        }

        public function mediaOutput($name, $type, $link) {
            
            global $siteController;
            
            // send api return headers
            $siteController->sendAPIHeaders();

            // send response code
            http_response_code(200);

            // build response json
            $arr = [
                "status" => "success",
                "code" => 0,
                "name" => $name,
                "type" => $type,
                "link" => $link
            ];

            // print json
            echo json_encode($arr);
        }
    }
?>