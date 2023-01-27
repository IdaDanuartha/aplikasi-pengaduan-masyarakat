<?php

class DashboardController extends Controller {
    public function index()
    {
        $this->view("layouts/dashboard/header");
        $this->view("layouts/dashboard/sidebar");
        $this->view("pages/dashboard/index");
        $this->view("layouts/dashboard/footer");
    }
}