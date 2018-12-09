<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Models\Card;
use App\Models\Page;
use DB;
use Carbon\Carbon;
use Mail;
use App\Mail\ContactEmail;
use Cache;

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

        $request->validate([
            'civilite' => 'required',
            'prenom' => 'required',
            'nom' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        
        $data = [
            'civilite' => $request->get('civilite'),
            'prenom' => $request->get('prenom'),
            'nom' => $request->get('nom'),
            'tel' => $request->get('tel'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
            'potal' => $request->get('postal'),
            'type' => $request->get('type'),
            'created_at' => Carbon::now(),
        ];

        DB::table('messages')->insert([
            'data' => json_encode($data)
        ]);

        Mail::to('vendome.real.estate16@gmail.com')->send(new ContactEmail($data));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès');
    }

    public function getAgence() {
        $content = Page::where('label', 'agence')->firstOrFail();
        $content = $content->content;

        return view('front.agence', compact('content'));
    }

    public function getSold() {
        $cards = Card::where('data->sold', (string)true)->get();

        return view('front.buy', compact('cards'));
    }

    public function getCgv() {
        $content = Page::where('label', 'cgv')->firstOrFail();
        $content = $content->content;

        return view('front.cgv', compact('content'));
    }

    public function cards() {
        $cards = Card::all();

        foreach ($cards as $card) {

            $card->slug = $card->data['title'];
            $card->img = $card->getFirstImage();
            $card->type = $card->data['type'];
            $card->timestamp = $card->created_at->getTimestamp();
            $card->visible = true;
            $card->description = Markdown::convertToHtml($card->data['description']);
        }

        return $cards;
    }
}
