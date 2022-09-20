<?php

namespace App\Http\Controllers;
use App\Models\Item;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        $viewData["best_sellers"] = Item::orderBy('quantity')->groupBy('product_id')->get();
        return view("home.index")->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] = "About us";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by: Team 3";

        return view("home.about")->with("viewData", $viewData);
    }
}
