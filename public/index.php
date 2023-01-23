<?php 
    // import libs
    require_once("../vendor/autoload.php");

    // import page config
    require_once("../config.php");
    $config = new api\config\PageConfig();

    // init controllers
    require_once("../app/ControllerManager.php");

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
            
            // send error output
            $outputController->errorOutput(1, "This site required https protocol");
        }
    }

    // check if token not empty
    if (empty($config->config["token"]) or $config->config["token"] == null) {

        // send error output
        if ($config->config["token"] == null) {
            $outputController->errorOutput(2, "config validate token is null");       
        } else {
            $outputController->errorOutput(2, "config validate token is empty");       
        }
    }
    
    // check if requst used invalid api token
    if ($siteController->getAPIToken() != $config->config["token"]) {

        if ($siteController->getAPIToken() == null) {
            $outputController->errorOutput(3, "API token required");
        } else {
            $outputController->errorOutput(4, "API token is invalid");       
        }
    }
    
    // check if resource strucute is valud
    if ($resourcesController->checkResourceStrucutre() == false) {

        // create default storage structure
        $resourcesController->createSturcture();

        // send invalid resource structure error
        $outputController->errorOutput(7, "Resource strucure is invalud, check file write/read permission");
    }

    // check if media type available
    if ($siteController->getMediaType() == null) {

        // send media type not found error
        $outputController->errorOutput(5, "media parameter is empty");  
    }

    // check if media type valid
    if (($siteController->getMediaType() != "image") && ($siteController->getMediaType() != "video") && ($siteController->getMediaType() != "gif")) {

        // send invalid type error
        $outputController->errorOutput(6, "media type is invalid, available types is:(image, video, gif)");  
    }

    //////////////////////////// MAIN-API-FUNCTION ////////////////////////////
    $outputController->mediaOutput("name_idk", $siteController->getMediaType(), "link");
    ///////////////////////////////////////////////////////////////////////////
?>