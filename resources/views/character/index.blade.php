@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ye Adventurers</h3>
                </div>
                <div class="panel-body">
                    <!-- Search Form Input -->
                    <div class="row">
                        <div class="col-xs-11">
                            <div  class="form-group">
                                <input id="searchinput" type="text" name="search" class="form-control" placeholder="Search Characters..." />
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <a href="{{ route('character.create') }}" class="btn btn-success btn-block" title="Create a new character"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div>
                    <div id="searchlist" class="list-group">
                        @foreach($characters as $key => $character)
                            <a href="{{ route('character.show', $character->id) }}" class="list-group-item"><span>{{ $character->name }}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#searchlist').btsListFilter('#searchinput', {itemChild: 'span', cancelNode:''});
        });
    </script>
@endsection