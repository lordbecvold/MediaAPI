<?php // media content viewer

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

    // check if requst used invalid api token
    if ($siteController->getAPIToken() != $config->config["token"]) {

        if ($siteController->getAPIToken() == null) {
            $outputController->errorOutput(3, "API token required");
        } else {
            $outputController->errorOutput(4, "API token is invalid");       
        }
    }

    // check if category not empty
    if (empty($_GET["category"])) {

        // send error response
        $outputController->errorOutput(7, "category get parameter not found");
    }

    // check if file not empty
    if (empty($_GET["file"])) {

        // send error response
        $outputController->errorOutput(8, "file get parameter not found");
    }    

    // security check
    if (str_contains($_GET["category"], "/")) {

        // send error response
        $outputController->errorOutput(9, "category get parameter contains insecure character '/'");
    } else if (str_contains($_GET["file"], "/")) {

        // send error response
        $outputController->errorOutput(10, "file get parameter contains insecure character '/'");
    } else {

        // build file path
        $file = $config->config["storage_path"]."/".$_GET["category"]."/".$_GET["file"];
        
        // check if media exist
        if (!file_exists($file)) {

            // send error response
            $outputController->errorOutput(11, "media ".$_GET["file"]." not found");
        } else {

            // send content type header
            header('Content-type: '.mime_content_type($file));

            // display file content
            echo file_get_contents($file);
        }
    }
?>