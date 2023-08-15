<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/Database.php';
require_once 'config/conf.php';
require_once 'utilities/Utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


function showErrors(){
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $controller_name = ucfirst($_GET['controller']) . 'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action']) ){
    $controller_name = controller_default;
} else {
    echo "La página que buscas no existe";
    showErrors();
    exit();
}

if (class_exists($controller_name)) {
    $controller = new $controller_name;

    

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    }elseif( !isset($_GET['controller']) && !isset($_GET['action']) ){
        $action = action_default;
        $controller->$action();
    } else {
        echo "No existe un tal método";
        showErrors();
    }
} else {
    echo "No existe una clase";
    showErrors();
}

require_once 'views/layout/footer.php';

ob_end_flush();