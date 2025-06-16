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

    // Get Single Student (GET)
    public function show($id = null)
    {
        $student = $this->model->find($id);

        if (!$student) {
            return $this->failNotFound('Student not found');
        }

        return $this->respond($student);
    }

    // Create Student (POST)
    public function create()
    {
        $data = $this->request->getJSON();

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Student created successfully'
            ]
        ]
    }


}


?>