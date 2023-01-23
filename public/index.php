<?php 
    // import libs
    require_once("../vendor/autoload.php");

    // import page config
    require_once("../config.php");
    $config = new api\config\PageConfig();

    // init controllers
    require_once("../app/controllers/SiteController.php");
    $siteController = new \api\controllers\SiteController();
    require_once("../app/controllers/OutputController.php");
    $outputController = new \api\controllers\OutputController();
    require_once("../app/controllers/SecurityController.php");
    $securityController = new \api\controllers\SecurityController();

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
    
    echo "api";



    
?>