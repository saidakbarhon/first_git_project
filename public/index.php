<?php
    session_start();
    require_once __DIR__ ."/../vendor/autoload.php";
    use myClasses\Db;

    require dirname(__DIR__) . '/config/config.php';
    require CORE . '/funcs.php';

    $db_config = require CONFIG . '/db.php';
    $db = new Db($db_config);
    // $db = new Db();

    require CORE . '/router.php';

    // dd(VIEWS);
    