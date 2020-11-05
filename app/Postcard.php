<?php

namespace App;

class Postcard{

    protected static function resolveFacade($name){
        return app()->make($name);
    }

    public static function __callStatic($name, $arguments)
    {
        // dd(app()->make('Postcard'));
        // dd($arguments);

        return dd(self::resolveFacade('Postcard'));
    }   

    // public static function any(){
    //     return dump('Inside');
    // }
}