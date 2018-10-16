<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Models\Card;
use App\Models\Page;

class FrontController extends Controller
{
    public function getIndex() {
        $cards = Card::all();

        return view('front.index', compact('cards'));
    }

    public function getBuy() {
        $cards = Card::all();

        return view('front.buy', compact('cards'));
    }

    public function getCard($id, $slug) {

        $card = Card::findOrFail($id);

        return view('front.card', compact('card'));
    }

    public function getSell() {
        return view('front.sell');
    }

    public function postSell(Request $request) {
        dd($_SERVER["HTTP_REFERER"]);
    }

    public function getCgv() {
        $content = Page::where('label', 'cgv')->firstOrFail();
        $content = $content->content;
        //$content = Markdown::convertToHtml($content);

        return view('front.cgv', compact('content'));
    }
}
