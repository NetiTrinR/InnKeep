<?php

namespace App\Http\Controllers;

use App\Journal;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('library.journal.index')->with('entries', Journal::campaigns()->viewable()->latest()->simplePaginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('library.journal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::user()->id;
        $input['viewable'] = !$request->private ?? true;
        Journal::create($input);

        Session::flash('success', 'Entry successfully submitted.');
        return redirect()->route('library.journal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Journal::find($id);
        if($entry->id != \Auth::user()->id && !\Auth::user()->journalViewable){
            return redirect()->back();
        }
        return view('library.journal.show')->with('entry', Journal::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('library.journal.edit')->with('entry', Journal::find($id));
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
        $input = $request->all();
        $input['user_id'] = \Auth::user()->id;
        $input['viewable'] = !$request->private ?? true;
        Journal::find($id)->update($input);
        return redirect()->route('library.journal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $j = Journal::find($id);
        if(\Auth::user()->id != $j->user->id)
            Session::flash('warning', 'You don\'t have the privilage to made that change.');
        else{
            Session::flash('success', 'Journal Entry successfully deleted');
            $j->delete();
        }
        return redirect()->route('library.journal.index');
    }
}
