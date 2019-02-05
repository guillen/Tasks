# Tasks Module For Laravel

## Install

````
composer require guillen/tasks
````

### Register 

In your `config/app.php` add Service Provider 

````
Lungo\Task\TaskServiceProvider::class,
````

### Register Routes

In your `app/Providers/RouteServiceProvider.php` file, add routes on map method

````
public function map()
{
    $this->mapApiRoutes();

    $this->mapWebRoutes();

    RouteRegister::routes();//add here
}
````

### Run migrations

````
php artisan migrate
````

## How to use

`RouteRegister` class create 2 RESTFull routes:

* GET \lungo\task: List all task in database
* POST \lungo\task: Create a task sending `name` and `description`

## Model

You can use `Lungo\Task\Database\Task` model for extend functionality. It is a normal Eloquent Model.

