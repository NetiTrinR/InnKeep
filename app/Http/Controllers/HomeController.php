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
        $announcements = Journal::with('character')
            ->orderBy('created_at', 'ASC')
            ->whereIn('campaign_id', Auth::user()->campaigns()->pluck('id'))
            ->where('created_at', '>=', \Carbon\Carbon::now()->subWeek(2)->startOfDay())
            ->get();
        return view('home', compact('announcements'));
    }
}



