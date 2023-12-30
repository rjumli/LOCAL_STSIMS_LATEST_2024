<?php

namespace App\Http\Controllers\Scholar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QualifierController extends Controller
{
    public function index(){
        return inertia('Modules/Scholars/Qualifiers/Index');
    }
}
