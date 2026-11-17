<?php

namespace App\Controllers;

class Comics extends BaseController
{
    public function index(): string
    {
        return view('drawings/Comics');
    }
}