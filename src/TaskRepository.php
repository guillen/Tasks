<?php

namespace Lungo\Task;

use Lungo\Task\Database\Task;

class TaskRepository
{
    public function createTask($name, $description = '') 
    {
        return Task::create([
            $name,
            $description ? $description : 'test',
        ]);
    }

    public function all()
    {
        return Task::all();
    }
}
