<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MessagesController extends Controller
{
    public function index() {
    	$messages = DB::table('messages')->orderBy('id', 'desc')->get();

    	return view('dashboard.messages.index', compact('messages'));
    }

    public function show($id) {
    	$message = DB::table('messages')->where('id', $id)->first();
    	$message->data = (object) json_decode($message->data);

    	return view('dashboard.messages.show', compact('message'));
    }

    public function destroy($id) {
    	DB::table('messages')->where('id', $id)->delete();
    	
    	return redirect()->action('Dashboard\MessagesController@index')->with('success', 'Message supprimé avec succès');
    }
}
