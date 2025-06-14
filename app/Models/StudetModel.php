<?php 
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model 
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';

    protected $allowedFields = ['name', 'email', 'sn', 'address', 'age', 'faculty'];

    protected $useTimeStamps = true;
    protected $createField = 'created_at',
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[students.email]',
        'sn' => 'required|is_unique[students.sn]',
        'age' => 'required|numeric',
        'faculty' => 'required'
    ]

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ],

        'sn' => [
            'is_unique' => 'this serial number already exists.'
        ]
    ]

}


?>