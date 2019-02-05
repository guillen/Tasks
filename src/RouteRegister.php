<?php 

namespace Lungo\Task;

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegister
{
    protected $router;

    public static function routes()
    {
        $options = [
            'prefix' => 'lungo',
            'namespace' => '\Lungo\Task\Http\Controllers',
        ];

        Route::group($options, function ($router) {
            $router->get('/task', [
                'uses' => 'TaskController@index',
                'as' => 'lungo.task.list',
            ]);

            $router->post('/task', [
                'uses' => 'TaskController@store',
                'as' => 'lungo.task.store',
            ]);
        });
    }
}
