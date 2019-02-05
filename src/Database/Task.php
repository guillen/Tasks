<?php

namespace Lungo\Task\Database;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description'];

    protected $table = 'lungo_tasks';
}
