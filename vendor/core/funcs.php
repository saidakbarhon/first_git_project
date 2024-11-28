<?php

    function dump($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function dd($data)
    {
        dump($data);
        die;
    }

    function abort($code = 404){
        http_response_code($code);
        require ERRORS . "/{$code}.php";
        die;
    }

    function load($fillable = [])
    {
        $data = [];
        foreach ($_POST as $k => $v) {
            if (in_array($k, $fillable)) {
                $data[$k] = trim($v);
            }
        }
        return $data;

    }

    function old($fieldname) {
        return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
    }

    function h($data){
        return htmlspecialchars($data, ENT_QUOTES);
    }

    function redirect($url = ''){
        if($url){
            $redirect = $url;
        }else {
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        header("Location: {$redirect}");
        die;
    }

    function get_alerts(){
        if(isset($_SESSION['success'])){
            require VIEWS .'/incs/alert_success.php';
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['error'])){
            require VIEWS .'/incs/alert_error.php';
            unset($_SESSION['error']);
        }
    }