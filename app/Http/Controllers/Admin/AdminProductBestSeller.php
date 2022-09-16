<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductBestSeller;

class AdminProductHistoryController extends Controller
{

    public function index($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Best Seller Products - Online Store";
        $product = Product::findOrFail($id);
        $viewData["product"] = $product;
        $viewData["history"] = ProductBestSeller:: where('product_id', $id)->get();
        
        return view('admin.bestSellerProduct.index')->with("viewData", $viewData);
    }
}