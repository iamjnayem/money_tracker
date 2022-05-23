<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return "category index";
    }

    public function store(){
        return "category store";
    }
    public function delete(){
        return "category delete";
    }
}
