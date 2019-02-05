<?php 

namespace Lungo\Task\Test;

use PHPUnit\Framework\TestCase;
use Lungo\Task\TaskRepository;
use Illuminate\Http\Request;
use Lungo\Task\Database\Task;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Lungo\Task\Http\Controllers\TaskController;
use Mockery;

class TaskControllerTest extends TestCase
{
    public function test_tasks_can_be_stored()
    {
        $name = 'Test Name';
        $description = 'Test Description';
        $data = compact('name', 'description');

        //mock request
        $request = Request::create('/lungo/task', 'POST', $data);

        //mock repository
        $tasks = Mockery::mock(TaskRepository::class);
        $tasks->shouldReceive('createTask')
            ->once()
            ->with($name, $description)
            ->andReturn($task = new Task());

        //mock validator
        $validator = Mockery::mock(ValidationFactory::class);
        $validator->shouldReceive('make')
            ->once()
            ->with($data, [
                'name' => 'required|string|max:150',
                'description' => 'nullable|string|max:255',
            ])
            ->andReturn($validator);
        $validator->shouldReceive('validate')->once();

        //controller execution
        $controller = new TaskController($tasks, $validator);
        $resp = $controller->store($request);

        //assert
        $this->assertEquals($task, $resp);
    }
}
