<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Tag;
use App\User;
use App\Template;
use App\Character;
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
        $characters = Auth::user()->characters()->with('campaign')->get();
        return view('character.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character.create')->with('templates', Template::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['stats'] = trim(preg_replace('/\s+/', ' ', $request->stats)); // Trim whitespace
        $this->validate($request, ['name' => 'required', 'stats' => 'required|json']);
        $char = new Character($request->all());
        Auth::user()->characters()->save($char);
        return redirect()->route('character.edit', $char->id);
    }

    /**
     * Store a newly created character in storage using a template.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function template(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $template = Template::findOrFail($request->template);
        $char = new Character([
            'name' => $request->name,
            'stats' => $template->json
        ]);
        Auth::user()->characters()->save($char);

        return redirect()->route('character.edit', $char->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('character.show')->with('character', Character::findOrFail($id)->viewable());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(Character::find($id));
        return view('character.edit')->with('character', Character::find($id)->viewable());
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
        $this->validate($request, ['name' => 'required|alpha_num', 'stats' => 'required|json', 'campaign_id' => 'exists:campaigns']);
        $char = Character::find($id);
        if(\Auth::user()->id != $char->user()->id)
            Session::flash('warning', 'You don\'t have the privilage to made that change.');
        else{
            Session::flash('success', 'Character successfully updated');
            $char->update($request);
        }
        return redirect()->route('character.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $char = Character::find($id);
        if(\Auth::user()->id != $j->user->id)
            Session::flash('warning', 'You don\'t have the privilage to made that change.');
        else{
            Session::flash('success', 'Character has been successfully deleted.');
            $char->delete();
        }
        return redirect()->route('character.index');
    }
}
