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
                    <h3>Journal</h3>
                    <p>
                        Your Journal is your personal pocket brain, often used for things you cannot trust yourself to remember. Or for you to post announcements to your campaign. Or for your character to randomly scribble in to confuse the government which is obviously searching through your bed roll to find this exotic wordkin hoping to find a weakness they can exploit against you in order to advance their agenda of creating the first public healthcare system for orcs. <small>(Never give healthcare to orcs. They breed too much. You'll bankrupt the system alone on the wetnurse fees.)</small>
                        You know, the usual.
                    </p>
                    <a href="{{ route('library.journal.create') }}" class="btn btn-success">Write Yo Journal</a>
                    <a href="{{ route('library.journal.index') }}" class="btn btn-default">Read Yo Journal</a>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Inventory</h3>
                            <p>
                                Weapons, Spells, Items. If you can have it, it lives here.<br />
                                <small>In the case of some magic items, literally!</small>
                            </p>
                            <a href="{{-- route('library.item.create') --}}" class="btn btn-success">Make a thing</a>
                            <a href="{{-- route('library.item.index') --}}" class="btn btn-default">All the things</a>
                        </div>
                        <div class="col-md-6">
                            <h3>Tags</h3>
                            <p>
                                Tags keep things in order and searchable. If you make a new inventory item and you don't tag it, good luck finding it else where. <small>The web bunnies like to take untagged items and forever obscure them in the database.</small>
                            </p>
                            <a href="{{-- route('library.tag.create') --}}" class="btn btn-success">New a tag</a>
                            <a href="{{-- route('library.tag.index') --}}" class="btn btn-default">All the tags</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection