<?php

namespace App\Http\Controllers;

use Auth;
use App\Journal;
use App\Character;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Journal::campaigns()->viewable()->get());
        $announcements = Journal::campaigns()->viewable()
            ->where('journals.created_at', '>=', \Carbon\Carbon::now()->subWeek(2)->startOfDay()) // Needs to have the journals otherwise it conflicts with the viewable join
            ->get();
        return view('home', compact('announcements'));
    }
}



