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
                                <li><a href="@{{ route('library.journal.index') }}">Read Journal</a></li>
                                <li><a href="@{{ route('library.journal.create') }}">New Entry</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tomes <small>Books</small></h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Tomes are the all powerful top level mojo hoopla. Think of Tomes as your books. Pathfinders, D&amp;D 5e, D&amp;D 3.5e are all different tomes. There is a reason after all that wizards covet them.
                            </p>
                            <ul>
                                <li><a href="@{{ route('library.book.index') }}">Read a book</a></li>
                                <li><a href="@{{ route('library.book.create') }}">Add a new Tome</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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
                                <li><a href="@{{ route('library.item.create') }}">Make a new thing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Tags keep things in order and searchable. If you make a new inventory item and you don't tag it, good luck finding it else where. <small>The web bunnies like to take untagged items and forever obscure them in the database.</small>
                            </p>
                            <ul>
                                <li><a href="@{{ route('library.tag.index') }}">View</a></li>
                                <li><a href="@{{ route('library.tag.create') }}">Create</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection