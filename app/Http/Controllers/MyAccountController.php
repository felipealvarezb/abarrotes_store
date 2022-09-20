<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData["title"] = "My Orders - Online Store";
        $viewData["subtitle"] = "My Orders";
        $viewData["orders"] = Order::with(["items.product"])->where("user_id", Auth::user()->getId())->get();
        return view("myaccount.orders")->with("viewData", $viewData);
    }

    public function pdf($id)
    {
        $viewData = [];
        $viewData["title"] = "My Orders - Online Store";
        $viewData["subtitle"] = "My Orders";

        $order = Order::findOrFail($id);
        $viewData["order"] = $order;
        //$pdf = Pdf::loadView("myaccount.pdf", ["viewData"=>$viewData]);
        //return $pdf->stream();
        return view("myaccount.pdf")->with("viewData", $viewData);
    }
}
