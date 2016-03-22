<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Character;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('character.index')->with('characters', Auth::user()->characters()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = \DB::table('templates')->select('id', 'name')->get();
        return view('character.create')->with('templates', $templates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created character in storage using a template.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function template(Request $request)
    {
        $template = DB::table('templates')->find($request->template);
        $char = new Character([
            'name' => $request->name,
            'stats' => $template->json
        ]);
        Auth::user()->characters()->save($char);

        return redirect()->route('character.edit', $char);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = Character::with('items.tags')->find($id);
        $weaponId = Tag::where('name', 'Weapon')->first()->id;
        $weapons = $character->items()->whereHas('tags', function($query) use($weaponId){
            return $query->where("tags.id", $weaponId);
        })->get();
        $stdItems = $character->items()->whereHas('tags', function($query) use($weaponId){
            return $query->where("tags.id", "<>", $weaponId);
        })->get();
        return view('character.show', compact('character', 'weapons', 'stdItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = Character::find($id);
        return view('character.edit')->with('character', $character);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
