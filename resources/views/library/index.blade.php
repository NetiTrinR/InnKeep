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
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tomes <small>Books</small></h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Tomes are the all powerful top level mojo hoopla. Tags subscribe to them, as does everything else. Think of Tomes as your books. Pathfinders, D&amp;D 5e, D&amp;D 3.5e are all different tomes.
                            </p>
                            <ul>
                                <li><a href="@{{ route('') }}">View</a></li>
                                <li><a href="@{{ route('') }}">Create</a></li>
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
                                Weapons, Spells, Items. If you have can it, it lives here.
                            </p>
                            <ul>
                                <li><a href="@{{ route('') }}">View</a></li>
                                <li><a href="@{{ route('') }}">Create</a></li>
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
                                Tags keep things in order and searchable. If you make a new inventory item and you don't tag it, good luck finding it else where.
                            </p>
                            <ul>
                                <li><a href="@{{ route('') }}">View</a></li>
                                <li><a href="@{{ route('') }}">Create</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection