<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();

        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["subtitle"] = $product->getName()." - Product information";
        $viewData["product"] = $product;
        
        return view('product.show')->with("viewData", $viewData);
    }

    public function search(Request $request)
    {
        
        $viewData = [];
        $query = $request->input("query");
        $search = Product::where("name", "like", '%'.$query.'%')->get();
        $viewData["title"] = "Searching products";
        $viewData["subtitle"] = "Here's what we found";
        $viewData["products"] = $search;
        
        return view("product.search")->with("viewData", $viewData);
    }
}
