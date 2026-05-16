<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $userModel->insert([

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'role' => 'user'
        ]);

        return redirect()->to('/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();

        $user = $userModel
            ->where('email', $this->request->getPost('email'))
            ->first();

        if ($user &&
            password_verify(
                $this->request->getPost('password'),
                $user['password']
            )) {

            session()->set([
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            return redirect()->to('/');
        }

        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}