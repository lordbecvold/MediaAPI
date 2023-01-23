<?php // init all controllers

    // init controllers
    require_once("../app/controllers/SiteController.php");
    require_once("../app/controllers/OutputController.php");
    require_once("../app/controllers/SecurityController.php");
    require_once("../app/controllers/ResourceController.php");

    // init instances
    $siteController = new \api\controllers\SiteController();
    $outputController = new \api\controllers\OutputController();
    $securityController = new \api\controllers\SecurityController();
    $resourcesController = new \api\controllers\resourceController();
?>