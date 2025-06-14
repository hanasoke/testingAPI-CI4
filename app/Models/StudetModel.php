<?php 
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model 
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';

    protected $allowedFields = ['name', 'email', 'sn', 'address', 'age', 'faculty'];

}


?>