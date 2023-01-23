<?php // media resource controller
    namespace api\controllers;

    class resourceController {

        public function init() {
            
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
    }

?>