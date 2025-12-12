<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use function Termwind\render;

class FormController extends Controller
{
    public function index()
    {
        return view('form.index');
    }
}
