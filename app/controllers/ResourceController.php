<?php // media resource controller
    namespace api\controllers;

    class resourceController {

        // init resource manager
        public function createSturcture() {
            
            global $config;

            // check if storage path exist (main path)
            if (!file_exists($config->config["storage_path"])) {
                
                // create path
                @mkdir($config->config["storage_path"]); 
            } 

            // check if storage path exist (images)
            if (!file_exists($config->config["storage_path"]."/images")) {
                
                // create path
                @mkdir($config->config["storage_path"]."/images"); 
            } 

            // check if storage path exist (test_category)
            if (!file_exists($config->config["storage_path"]."/test_category")) {
                
                // create path
                @mkdir($config->config["storage_path"]."/test_category"); 
            } 

            // check if storage path exist (gifs)
            if (!file_exists($config->config["storage_path"]."/gifs")) {
                
                // create path
                @mkdir($config->config["storage_path"]."/gifs"); 
            } 

            // check if storage path exist (videos)
            if (!file_exists($config->config["storage_path"]."/videos")) {
                
                // create path
                @mkdir($config->config["storage_path"]."/videos"); 
            } 
        }
    
        // check if resource structure valid
        public function checkResourceStrucutre() {

            global $config;

            // check if storage path exist (main path)
            if (file_exists($config->config["storage_path"])) {
                
                return true;
            } 
        }

        // get random media by category
        public function getMedia($category) {

            global $config;

            // dir path builder
            $path = $config->config["storage_path"]."/".$category."/";

            // check if path exist
            if (file_exists($path)) {
                
                // get files array
                $files = glob($path."*.*");

                // randomize array
                shuffle($files);

                // strip file path
                $file = str_replace("../storage/$category/", "", $files[0]);

                // return file
                return $file;
            } 
        }
    }
?>