<?php 
namespace App\Controllers;

use App\Controllers\BaseController;

class Sign extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login Page'
        ];
        
        return view('sign/login', $data);
    }
    
    public function attemptLogin()
    {
        // Add your login validation and processing here
    }
    
    public function register()
    {
        $data = [
            'title' => 'Register Account'
        ];
        
        return view('sign/register', $data);
    }
    
    public function attemptRegister()
    {
        // Add your registration validation and processing here
    }
    
    public function forgotPassword()
    {
        // Add forgot password functionality
    }
}