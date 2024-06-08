<?php

namespace App\Controllers;

use App\Models\Users;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Registration extends BaseController
{
    public function register()
    {
        helper(['form', 'url']);
        $model = new Users();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'password_confirm' => 'matches[password]',
            ];            

            if (!$this->validate($rules)) {
                return view('register', [
                    'validation' => $this->validator
                ]);
            } else {
                $inputData  = $this->request->getPost();
                $password   = $inputData['password'];
                $data = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                ];

                $model->register($data);
                return redirect()->to('/user/success');
            }
        }

        return view('registration');
    }

    public function success()
    {
        return view('register_success');
    }

    public function login() {
        helper('url');
        helper('common_helper');
        if (session()->get('admin_id')) {
            return $this->response->redirect(site_url('/'));
        }
        helper(['form']);
        $rules = [
            'password' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ];
        if ($this->request->is('post')) {
            $data = [];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
                return view('registration', $data);
            }
            $requestData = $this->request->getPost();
            $action      = (new Users)->loginprocess($requestData, $this->request->getIPAddress());
            if ($action['status']) {
                return redirect()->to(site_url($action));
            }
            return view('registration', [
                'validation' => $this->validator,
                'error' => $action['message']
            ]);            
        }                
    }
    public function signup()
    {
        $data = [];
        helper(['form', 'url']);
        var_dump($this->request->is('post'));
        if ($this->request->is('post')) {
            $rules = [
                'name'      => 'required|min_length[3]|max_length[60]',
                'email'     => 'required|valid_email|is_unique[users.email]',
                'mobile'    => 'required|numeric|min_length[10]|is_unique[users.mobile]',
                'password'  => 'required|min_length[8]'
            ];
            var_dump(!$this->validate($rules));
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $inputData  = $this->request->getPost();
                $password   = $inputData['password'];
                $userData   = [
                    'name'          => $inputData['name'],
                    'email'         => $inputData['email'],
                    'mobile'        => $inputData['mobile'],
                    'password'      => password_hash($password, PASSWORD_BCRYPT),
                    'created_at'    => date('Y-m-d H:i:s')
                ];
                print_r($userData);die;
                if ((new Users)->insert((object)$userData)) {
                    $data['success'] = 'User registered successfully. Login to enjoy our ecom products!';
                    session()->setFlashdata('success', 'User registered successfully. Login to enjoy our ecom products!');
                } else {
                    session()->setFlashdata('error', 'Error occurred while registering user.');
                    $data['error'] = 'Error occurred while registering user.';
                }
            }
        }
        return view('registration', $data);
    }
}
