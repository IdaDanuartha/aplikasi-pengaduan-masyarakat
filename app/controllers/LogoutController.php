<?php

class LogoutController extends Controller {
    public function signout()
    {
        $this->model('User')->logout();
        
        redirect('login');
    }
}