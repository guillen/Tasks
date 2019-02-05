<?php 

namespace Lungo\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Lungo\Task\TaskRepository;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class TaskController 
{
    protected $tasks;
    protected $validation;
    
    public function __construct(TaskRepository $tasks, ValidationFactory $validation)
    {
        $this->tasks = $tasks;
        $this->validation = $validation;
    }

    public function index()
    {
        return $this->tasks->all();
    }

    public function store(Request $request)
    {
        $this->validation->make($request->all(), [
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:255',
        ])->validate();

        return $this->tasks->createTask($request->name, $request->description);
    }

}
