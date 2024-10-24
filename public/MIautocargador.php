<?php
spl_autoload_register(function ($clase) {

    include $_SERVER['DOCUMENT_ROOT'].'/Plantillas/App/Controllers/HomeController.php';
    include $_SERVER['DOCUMENT_ROOT'].'/Plantillas/App/Models/User.php';
    
});