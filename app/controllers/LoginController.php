<?php

class LoginController extends Controller {
    public function index()
    {
       $this->view("layouts/auth/header");
       $this->view("pages/auth/login");
       $this->view("layouts/auth/footer");
    }
}