<?php 

namespace App\Models;

use CodeIgniter\Model;

class SignModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'password', 'grade'];
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}

?>