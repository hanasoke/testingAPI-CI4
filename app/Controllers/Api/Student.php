<?php 

namespace App\Controllers\Api;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

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
        $students = $this->model->findAll();
        return $this->respond([
            'status' => 200,
            'data' => $students
        ]);
    }

    // Get Single Student (GET)
    public function show($id = null)
    {
        $student = $this->model->find($id);

        if (!$student) {
            return $this->failNotFound('Student not found');
        }

        return $this->respond([
            'status' => 200,
            'data' => $student
        ]);
    }

    // Create Student (POST)
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated([
            'status' => 201,
            'messages' => 'Student created successfully',
            'data' => $this->model->find($this->model->getInsertID())
        ]);
    }

    // Update Student (PUT)
    public function update($id = null)
    {
        $data = $this->request->getJSON();

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Student updated successfully'
            ]
        ];

        return $this->respond($response);
    }

    // Delete Student (DELETE)
    public function delete($id = null)
    {
        $student = $this->model->find($id);

        if (!$student) {
            return $this->failNotFound('Student not found');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status' => 200,
            'messages' => 'Student deleted successfully'
        ]);
    }

    // Handle OPTIONS requests for CORS
    public function options()
    {
        return $this->response->setStatusCode(200);
    }
}


?>