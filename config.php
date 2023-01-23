<?php // API config
    namespace api\config;
    
    class PageConfig {

        public $config = [

            // dev-mode (enable whoois and others error handlerers)
            "dev_mode" => true,

            // https (enable only https access to api)
            "https" => false,

            // token for validate request access
            "token" => "1234",

            "storage_path" => "../storage"
        ];
    }
?>