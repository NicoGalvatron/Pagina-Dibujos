<?php

namespace App\Controllers;

class Dibujos extends BaseController
{
    public function index(): string
    {
        return view('drawings/Dibujos');
    }
}