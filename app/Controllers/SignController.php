<?php

namespace App\Controllers;

class SignController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SignModel();
        helper(['form', 'url']);
    }

    public function login()
    {
        $data = [
            'title' => 'Login Page'
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]'
            ];

            if ($this->validate($rules)) {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user = $this->model->getUserByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    // Set session 
                    $session = session();
                    $session->set([
                        'user_id' => $user['user_id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'grade' => $user['grade'],
                        'logged_in' => true
                    ]);

                    return redirect()->to('/dashboard');
                } else {
                    $data['error'] = 'Email atau password salah';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('sign/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register Page'
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'password_confirm' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $userData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'grade' => 'member' // Default grade
                ];

                $this->model->save($userData);
                session()->setFlashdata('success', 'Registrasi berhasil! Silahkan login.');
                return redirect()->to('/login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('sign/register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}