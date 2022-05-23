<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackerInfoController extends Controller
{

    public function index(){
        return "tracker info Index";
    }
    public function store(){
        return "tracker info store";
    }

    public function show(){
        return "tracker info  show";
    }
    public function update(){
        return "tracker info  update";
    }
    public function delete(){
        return "tracker info delete";
    }

    public function report(){
        return "tracker info report";
    }

    public function filter(){
        return "tracker info filter";
    }

}
