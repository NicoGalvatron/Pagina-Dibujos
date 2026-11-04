<?php

namespace App\Controllers;

class drawingindex extends BaseController
{
    public function index(): string
    {
        return view('drawings/drawingindex');
    }
}