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
                                <input id="search" type="text" name="search" class="form-control" placeholder="Search Characters..." />
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <a href="{{ route('character.create') }}" class="btn btn-success btn-block" title="Create a new character"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                    </div>
                    <div id="list" class="list-group">
                        @foreach($characters as $key => $character)
                            <a id="character-{{ $character->id }}" href="{{ route('character.show', $character->id) }}" class="list-group-item" data-name="{{ $character->name }}" data-campaign="{{ $character->campaign->name }}"><span>{{ $character->name }}, {{ $character->campaign->name }}</span></a>
                        @endforeach
                        <a href="#" id="character-2" class="list-group-item" data-name="meep" data-campaign="rawr">meep, rawr</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/2.2.0/fuse.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var listId = "#list";
            var listItems = ".list-group-item";
            var selector = listId+">"+listItems;
            var searchId = "#search";
            var keys = ["name", "campaign"];
            var list = $(selector).map(function(){
                var output = $(this).data();
                output.id = "#"+$(this).attr('id');
                return output;
            }).get();
            var fuse = new Fuse(list, {id:"id", keys:keys});
            $(document).on('keyup', searchId, function(e){
                if($(searchId).val().length > 0){
                    var result = fuse.search($(searchId).val());
                    $(selector).hide();
                    console.log(result.join(','));
                    $(result.join(',')).show();
                }else{
                    $(selector).show();
                }
                $(selector).css("border-radius", "0px");
                $(selector+":visible").each(function(index) {
                    if(index == 0){
                        $(this).css("border-top-left-radius", "4px");
                        $(this).css("border-top-right-radius", "4px");
                    }
                    if(index == $(".list-group-item:visible").length - 1){
                        $(this).css("border-bottom-left-radius", "4px");
                        $(this).css("border-bottom-right-radius", "4px");
                    }
               });
            })
        });
    </script>
@endsection