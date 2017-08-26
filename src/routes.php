<?php


Route::group([ 'prefix' => 'fredwared', 'namespace' => 'Fredwared\Translatable\\Controllers' ], function(){
    Route::get('/', function(){
        print (float)(0.1 + 0.7 * 8);
        return view('fredwared::welcome');
    });
//    Route::get('/', 'TestController@index');
});