<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondCtrl extends Controller
{
    public function toTheHome() {
        $name1 = 'Anon';
        $animals = ['Cat', 'Dog', 'Turtle'];

        return view('home', ['animalsName' => $animals, 'name' => $name1, 'catname' => 'CATS']);
    }

    public function singlePost() {
        return view('single-post');
    }
}
