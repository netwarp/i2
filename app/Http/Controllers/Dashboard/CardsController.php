<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Image;
use Storage;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();

        return view('dashboard.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = ['action' => 'Dashboard\CardsController@store', 'method' => 'POST', 'files' => true];

        return view('dashboard.cards.create_or_update', compact('params'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'surface' => 'required',
            'rooms' => 'required',
            'price' => 'required',
            'localisation' => 'required',
            'description' => 'required',
        ]);

        $folder = str_random(7);

        $data = [
            'title' => $request->get('title'),
            'surface' => (int) $request->get('surface'),
            'rooms' => (int) $request->get('rooms'),
            'price' => (int) $request->get('price'),
            'localisation' => $request->get('localisation'),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'folder' => $folder,
            'sold' => false,
            'images' => [],
            'folder' => $folder,
            'vendre_louer' => $request->get('vendre_louer')
        ];

        if (($request['files'])) {
            foreach ($request['files'] as $key => $file) {

                $extension = $file->extension(); // jpeg 

                $image = Image::make($file);

                $filename = $image->filename;

                $complete_name = "$filename.$extension";

                $path = "cards/$folder/$complete_name";

                $data['images'][$key] = $path;

                Storage::put($path, $image->encode());
            }
        }

        $card = new Card;
        $card->data = $data;
        $card->save();

        return redirect()->action('Dashboard\CardsController@index')->with('success', 'Fiche créee avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::findOrFail($id);
        $params = ['action' => ['Dashboard\CardsController@update', $card->id], 'method' => 'PUT', 'files' => true];
        
        return view('dashboard.cards.create_or_update', compact('card', 'params'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'surface' => 'required',
            'rooms' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $card = Card::findOrFail($id);
        
        $folder = $card->data['folder'];
        
        $data = [
            'title' => $request->get('title'),
            'surface' => (int) $request->get('surface'),
            'rooms' => (int) $request->get('rooms'),
            'price' => (int) $request->get('price'),
            'description' => $request->get('description'),
            'localisation' => $request->get('localisation'),
            'type' => $request->get('type'),
            'folder' => $folder,
            'sold' => $request->get('sold'),
            'images' => $card->data['images'],
            'vendre_louer' => $request->get('vendre_louer')
        ];

        if (($request['files'])) {
            foreach ($request['files'] as $key => $file) {
                if ($file) {
                    $extension = $file->extension(); // jpeg 

                    $image = Image::make($file);

                    $filename = $image->filename;

                    $complete_name = "$filename.$extension";

                    $path = "cards/$folder/$complete_name";

                    $data['images'][$key] = $path;

                    Storage::put($path, $image->encode());
                }
            }
        }

        $card->data = $data;
        $card->save();

        return redirect()->action('Dashboard\CardsController@index')->with('success', 'Fiche mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);

        $folder = $card->data['images'][0];
        $folder = explode('/', $folder);
        $folder = $folder[1];

        Storage::deleteDirectory("/cards/$folder");

        $card->delete();

        return redirect()->back()->with('success', 'Fiche supprimé avec succès');
    }
}
