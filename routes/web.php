<?php

use Illuminate\Support\Facades\Route;
use App\PostCardSendingService;
use App\Postcard;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/** */

class Human{
    public function eat(){
        return "Eating";
    }

    public function play(){
        return "Playing";
    }
}

app()->bind('human', function(){
    return new Human;
});




class Bike{
    public function start(){
        return "Starting";
    }
}

app()->bind('bike', function(){
    return new Bike;
});


class MainFacade{
    public static function __callStatic($name, $arguments)
    {
        return app()->make(self::getFacadeAccess())->$name();
    }

    protected static function getFacadeAccess(){

    }
}


class HumanFacade extends MainFacade{
    protected static function getFacadeAccess(){
        return 'human';
    }
}

// class BikeFacade extends MainFacade{
//     protected static function getFacadeAccess(){
//         return 'bike';
//     }
// }

dd(HumanFacade::eat());



/** */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/postcard', function(){

    $postCardService = new PostCardSendingService("Bangladesh", 5, 8);

    $postCardService->hello('Hello welcome', 'ridwanhoque2@gmail.com');
    
});


Route::get('/facades', function(){
    Postcard::anyother('123');
});

//test

Route::get('/test', [TestController::class, 'index']);