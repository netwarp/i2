<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function getIndex() {
        return view('front.index');
    }

    public function getBuy() {
        return view('front.buy');
    }

    public function getCard() {
        return view('front.card');
    }

    public function getSell() {
        return view('front.sell');
    }
}
