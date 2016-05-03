@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ye Olde Library</h3>
                </div>
                <div class="panel-body">
                    <p>Welcome to the Library. You may browse our books to find our items, weapons, spells, you name it. Just tag new entires so things are orderly.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Journals</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Your Journal is your personal pocket brain, often used for things you cannot trust yourself to remember. Or for you to post announcements to your campaign. Or for your character to randomly scribble in to confuse the government which is obviously searching through your bed roll to find this exotic wordkin hoping to find a weakness they can exploit against you in order to advance their agenda of creating the first public healthcare system for orcs. <small>(Never give healthcare to orcs. They breed too much. You'll bankrupt the system alone on the wetnurse fees.)</small>
                                You know, the usual.
                            </p>
                            <ul>
                                <li><a href="{{ route('library.journal.index') }}">Read Yo Journal</a></li>
                                <li><a href="@{{ route('library.journal.create') }}">Write Yo Journal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inventory</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Weapons, Spells, Items. If you can have it, it lives here.<br />
                                <small>In the case of some magic items, literally!</small>
                            </p>
                            <ul>
                                <li><a href="@{{ route('library.item.index') }}">All the things</a></li>
                                <li><a href="@{{ route('library.item.create') }}">Make a thing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Tags keep things in order and searchable. If you make a new inventory item and you don't tag it, good luck finding it else where. <small>The web bunnies like to take untagged items and forever obscure them in the database.</small>
                            </p>
                            <ul>
                                <li><a href="@{{ route('library.tag.index') }}">All the tags</a></li>
                                <li><a href="@{{ route('library.tag.create') }}">New a tag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection