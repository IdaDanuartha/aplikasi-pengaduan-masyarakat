<?php

function redirect($path) {
    header("Location: " . BASE_URL . "/$path");
    exit;
}

function dd($data) {
    var_dump($data);
    die;
}