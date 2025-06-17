<?php 
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model 
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';

    protected $allowedFields = ['name', 'email', 'sn', 'address', 'age', 'faculty'];

    protected $returnType = 'array';
    protected $useTimeStamps = true;

    protected $validationRules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[students.email,student_id,{student_id}]',
        'sn' => 'required|is_unique[students.sn,student_id,{student_id}]',
        'age' => 'required|numeric',
        'faculty' => 'required'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'This email is already registered'
        ],

        'sn' => [
            'is_unique' => 'this serial number already exists'
        ]
    ];
}


?>