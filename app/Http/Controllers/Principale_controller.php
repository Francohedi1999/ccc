<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Principale_controller extends Controller
{
    public function index()
    {
        $title = "E.G.S";

        return view('principale' , compact('title'));
    }
}
