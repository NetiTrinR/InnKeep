@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ye Olde Journal</div>
                <div class="panel-body">
                    @if($announcements->count() > 0)
                        @foreach($announcements as $announcement)
                            <blockquote>
                                {{ $announcement->entry }}
                                <footer>
                                    <cite>{{ isset($announcement->character) ? $announcement->character->name : $announcement->user->name }}</cite>, {{ Carbon\Carbon::parse($announcement->created_at)->diffForHumans() }}
                                </footer>
                            </blockquote>
                            <hr />
                        @endforeach
                    @else
                        <p class="text-center">
                            <span class="lead">Ye fiends are away</span><br />
                            <small>(No new entries for the last two weeks)</small>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ye Shit</div>
                <div class="panel-body">
                    <ul>
                        <li><a href="{{ route('character.index') }}">My Characters</a></li>
                        <li><a href="{{ url('#') }}">My Campaigns</a></li>
                        <li><a href="{{ url('#') }}">All viewable Journals</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ye Scrub
                </div>
                <div class="panel-body">
                    <ul>
                        <li><a href="{{ url('#') }}">Join Campaign (Players)</a></li>
                        <li><a href="{{ url('#') }}">Make a Campaign (DMs)</a></li>
                        <li><a href="{{ url('#') }}">Make a new Template</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
