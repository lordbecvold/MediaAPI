<?php 
    // import libs
    require_once("../vendor/autoload.php");

    // import page config
    require_once("../config.php");
    $config = new api\config\PageConfig();

    // init controllers
    require_once("../app/controllers/SiteController.php");
    $siteController = new \api\controllers\SiteController();

    // init error handler if dev mode enabled 
    if ($config->config["dev_mode"] == true) {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    // check if https required
    if ($config->config["https"] == true) {

        // check if site running on https
        if (!$siteController->siSSLRunning()) {
            
            // send api return headers
            $siteController->sendAPIHeaders();

            // build error json
            $arr = [
                "status" => "error",
                "code" => 1,
                "message" => "This site required https protocol"
            ];

            // print json & kill app
            die(json_encode($arr));
        }
    }

    echo "api";



    
?>