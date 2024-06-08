<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'email', 'password', 'created_at'];
    
    public function register($data)
    {
        return $this->insert($data);
    }

    public function checkEmailExists($email)
    {
        return $this->where('email', $email)->countAllResults() == 0;
    }  
    
    public function verifyLogin(string $username, string $password): ?array
    {
        // $pwd = sha1($password);
        return $this->db->table('users')
        ->select('email, name')
        ->where('email', $username)
        ->where('password', $password)
        ->get()->getResultArray();
    }
    
    function loginprocess(array $request, $ip)
    {
        // $pwd = sha1($request['password']);
        $result = $this->verifyLogin($request['email'], $request['password']);
        if ($result) {
            $session_array = [
                'admin_id' => $result[0]['id'],
                'admin_username' => $result[0]['name'],
                'admin_email' => $result[0]['email'],
                'admin_ip' => $ip,
            ];
            session()->set($session_array);
            return ['status' => true, 'redirect' => '/', 'message' => 'Login Successful'];
        } else {
            session()->setFlashdata('error', 'Invalid Details !');
            return ['status' => false, 'redirect' => '', 'message' => 'Invalid Details !'];
        }
    }    
}