<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use DB;
use App\Models\Card;


class DashboardController extends Controller
{
    public function getIndex() {
        $cards = Card::count();

        $messages = DB::table('messages')->count();

    	return view('dashboard.index', compact('cards', 'messages'));
    }

    public function getCgv() {

    	$content = Page::where('label', 'cgv')->first()->content;

    	return view('dashboard.cgv', compact('content'));
    }

    public function postCgv(Request $request) {

    	$page = Page::where('label', 'cgv')->firstOrFail();
    	$page->update([
    		'content' => $request->get('content')
    	]);

    	return redirect()->back()->with('success', 'CGV modifiées avec succès');
    }

    public function getAgence() {

    	$content = Page::where('label', 'agence')->first()->content;

    	return view('dashboard.agence', compact('content'));
    }

    public function postAgence(Request $request) {
    	
    	$page = Page::where('label', 'agence')->firstOrFail();
    	$page->update([
    		'content' => $request->get('content')
    	]);

    	return redirect()->back()->with('success', 'Agence modifiées avec succès');
    }
}
