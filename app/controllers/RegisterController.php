<?php

class RegisterController extends Controller {
    public function index()
    {
       $this->view("layouts/auth/header");
       $this->view("pages/auth/register");
       $this->view("layouts/auth/footer");
    }
}