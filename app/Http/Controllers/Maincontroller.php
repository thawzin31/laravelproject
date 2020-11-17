<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Maincontroller extends Controller
{
    public function welcome($value="")
    {
    	return view("welcome");
    }

    public function testing($value="")
    {
    	return view("testing");
    }

    public function about($value="")
    {
    	return view("about");
    }

    public function contact($value="")
    {
    	return view("contact");
    }

}
