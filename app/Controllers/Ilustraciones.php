<?php

namespace App\Controllers;

class Ilustraciones extends BaseController
{
    public function index(): string
    {
        return view('drawings/Ilustraciones');
    }
}