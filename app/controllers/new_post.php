<?php

use myClasses\Validator;
// (48,'spun','32/1','havo','170','sana tex',2.090,'0000-00-00')


$serv = $_SERVER['REQUEST_METHOD'];
if($serv === 'POST'){

    $fillable = ['supplier', 'company']; 
    $data = load($fillable);
    $validator = new Validator();
    $rules = [
        'supplier' => [
            'required' => true,
            'min' => 3,
            'max' => 25,
        ],
        'company' => [
            'required' => true,
            'min' => 3,
            'max' => 45,
        ]
    ];
    $validation = $validator -> validate($data, $rules);

    // $errors = [];
    if(!$validator -> hasErrors()){
        if(empty($errors)){
            if($db -> query("INSERT INTO `supplers` (`suppler_name`, `company_name`) VALUES (:supplier, :company)", $data)){
                $_SESSION['success'] = "OK";
            }else {
                $_SESSION['error'] = "DB Error";
                // abort(500);
            }
            redirect("/post/new-post");
        }
        // dump($validator -> getErrors());
    }

}

$title = 'My Blog :: New Post';
require_once VIEWS . '/new_post.tpl.php';