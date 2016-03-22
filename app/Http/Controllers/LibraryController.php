<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LibraryController extends Controller
{
    /**
     * Show the library index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('library.index');
    }
}
