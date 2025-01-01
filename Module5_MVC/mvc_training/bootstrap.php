<?php

define('_DIR_ROOT', __DIR__);

//Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {  //kiểm tra xem có phải là https không
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$dirRoot = str_replace('\\', '/', _DIR_ROOT);
$documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));
$web_root = $web_root . $folder;

define('_WEB_ROOT', $web_root);  //link gốc của website

/*

*/
$configs_dir = scandir('configs'); //lấy danh sách file trong thư mục configs

//load các file config
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}

require_once _DIR_ROOT . '/app/core/Route.php';   //load route class
require_once 'app/App.php';     //load app


//Kiểm tra config và load Database
if (!empty($config['database'])) { //

    $db_config = $config['database'];

    if (!empty($db_config)) {
        require_once  _DIR_ROOT . '/app/core/Connection.php';
        require_once  _DIR_ROOT . '/app/core/Database.php';
        require_once _DIR_ROOT . '/app/core/QueryBuilder.php';
    }
}

require_once _DIR_ROOT . '/app/core/Model.php';     //load base model

require_once _DIR_ROOT . '/app/core/Controller.php';    //load base controller
