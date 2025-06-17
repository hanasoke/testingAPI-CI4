<?php 
namespace App\Controllers;

use App\Controllers\BaseController;

class Sign extends BaseController
{
    public function login()
    {
        echo view('templates/sign/header');
        echo view('sign/login');
        echo view('templates/sign/footer');
    }

    public function register()
    {
        echo view('templates/sign/header');
        echo view('sign/register');
        echo view('templates/sign/footer');
    }
}