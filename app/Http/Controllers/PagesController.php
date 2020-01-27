<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function about(){
        return view("pages.about");
    }

    public function contact(){
        return view("pages.contact");
    }

    public function terms(){
        return view("pages.terms");
    }

    public function policy(){
        return view("pages.policy");
    }

    public function webdev(){
        return view("pages.webdev");
    }

    public function uiux(){
        return view("pages.uiux");
    }

    public function datascience(){
        return view("pages.datascience");
    }

    public function mobile(){
        return view("pages.mobile");
    }
}
