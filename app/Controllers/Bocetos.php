<?php

namespace App\Controllers;

class Bocetos extends BaseController
{
    public function index(): string
    {
        return view('drawings/Bocetos');
    }
}