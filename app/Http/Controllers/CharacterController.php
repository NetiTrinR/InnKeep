<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Tag;
use Session;
use App\User;
use Validator;
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
        Session::flash('success', 'Character successfully created.');
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
        $user = Auth::user();
        $char = new Character([
            'name' => $request->name,
            'stats' => $template->json
        ]);
        DB::transaction(function() use ($char, $user, $template){
            $char->save();
            $user->characters()->save($char);
            $template->characters()->save($char);
        });
        Session::flash('success', 'Character successfully created via template. Please personalize your data.');
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
        return view('character.edit')->with('character', Character::findOrFail($id)->viewable())->with('i', 0);
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

        // Put stats back into json
        $input = $request->only(['name', '_method', '_token']);
        $input['stats'] = json_encode($request->except(['name', '_method', '_token']));

        // Validation
        $v = Validator::make($input, ['name' => 'required|alpha_num', 'stats' => 'required|json', 'campaign_id' => 'exists:campaigns']);

        // Authentication
        $char = Character::find($id);
        if(\Auth::user()->id != $char->user->id)
            Session::flash('warning', 'You don\'t have the privilage to made that change.');
        else{
            Session::flash('success', 'Character successfully updated');
            $char->update($input);
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
