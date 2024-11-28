<?php

$post_id = $_GET['id'];

$executes = [
    ':id'=> $post_id,
];

$post = $db ->query("SELECT * FROM `supplers` WHERE `id` = :id", $executes)->findOrFail();

$title = "My Blog :: {$post['suppler_name']}";


require_once VIEWS . '/post.tpl.php';
