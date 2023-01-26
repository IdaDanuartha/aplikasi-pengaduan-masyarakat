<?php

class DashboardController extends Controller {
    public function index()
    {
       var_dump( $this->model('User')->getUsers());
    }
}