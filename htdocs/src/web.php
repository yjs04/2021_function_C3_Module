<?php

use App\Router;

Router::get("/","ViewController@index");
Router::get("/history","ViewController@history");
Router::get("/phone","ViewController@phone");
Router::get("/cultures","ViewController@cultures");
Router::get("/addCulture","ViewController@addCulture");
Router::get("/modCulture/{id}","ViewController@modCulture");
Router::get("/delCultureProccess/{id}","ActionController@delCultureProccess");
Router::get("/monthShow","ViewController@monthShow");
Router::get("/addShow","ViewController@addShow");
Router::get("/modShow/{id}","ViewController@modShow");
Router::get("/delShowProccess/{id}","ActionController@delShowProccess");
Router::get("/yearShow","ViewController@yearShow");
Router::get("/openCulture","ViewController@openCulture");
Router::get("/openShow","ViewController@openShow");

Router::post("/addCultureProccess","ActionController@addCultureProccess");
Router::post("/modCultureProccess/{id}","ActionController@modCultureProccess");
Router::post("/addShowProccess","ActionController@addShowProccess");
Router::post("/modShowProccess/{id}","ActionController@modShowProccess");

Router::get("/image","ActionController@loadImage");
Router::get("/openAPI/nihList.php","ApiController@nihList");
Router::get("/openAPI/showList.php","ApiController@showList");

Router::start();