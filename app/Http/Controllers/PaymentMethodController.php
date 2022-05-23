<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(){
        return "Payment method index";
    }
    public function store(){
        return "Payment method store";
    }
    public function delete(){
        return "Payment method delete";
    }
}
