<?php



namespace App\Http\Controllers;

use App\Models\CarouselImage;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class Controller extends BaseController
{
    public function showWelcome()
    {
        $carouselImages = CarouselImage::all();
        $news = News::all();
        return view('welcome', compact('carouselImages', 'news'));
    }

    public function showNews(News $news)
    {
        return view('news.show', compact('news'));
    }
}




