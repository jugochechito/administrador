<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CarouselImage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function showWelcome()
{
    $carouselImages = CarouselImage::all();
    return view('welcome', compact('carouselImages'));
}
}

