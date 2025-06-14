<?php 

namespace App\Controllers;
use App\Controllers\BaseController;
use Codeigniter\API\ResponseTrait;

class Student extends BaseController 
{
    use ResponseTrait;
    protected $model;

    public function __construct() {
        $this->model = new \App\Models\StudentModel();
    }

    // Get All Students (GET)
    public function index()
    {
        $student = $this->model->findAll();
        return $this->respond($students);
    }

    


}


?>