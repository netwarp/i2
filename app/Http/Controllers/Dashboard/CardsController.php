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
            'description' => 'required',
        ]);

        $folder = str_random(7);

        $data = [
            'title' => $request->get('title'),
            'surface' => $request->get('surface'),
            'rooms' => $request->get('rooms'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'folder' => $folder,
            'sold' => false,
            'images' => [],
            'folder' => $folder
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
            'surface' => $request->get('surface'),
            'rooms' => $request->get('rooms'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'folder' => $folder,
            'sold' => false,
            'images' => $card->data['images']
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
