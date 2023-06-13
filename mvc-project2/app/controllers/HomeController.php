<?php

namespace App\Controllers;
class HomeController
{


    public function about($categrySlug,$sliderID)
    {
        view('contact',[
            'categrySlug'=>$categrySlug
        ]);


    }
}