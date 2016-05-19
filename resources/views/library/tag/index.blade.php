@extends('layouts._app')

@section('header.styles')
<style>
    .label{
        display:inline-block;
        margin: 3px;
    }
</style>
@endsection

@section('content')
<div id="vue-container" class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tags in all thee mighty glory</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-11">
                        <div id="searchcontainer" class="form-group">
                            <input id="searchinput" type="text" name="search" class="form-control" placeholder="Search Tags..." />
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <a href="{{ route('library.tag.create') }}" class="btn btn-success btn-block" title="Create a new journal entry"><i class="glyphicon glyphicon-plus"></i></a>
                    </div>
                </div>
                <div class="text-center">
                    <span v-for="tag in tags" class="label label-default">@{{ tag.name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer.scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script type="text/javascript">
        Vue.config.debug = true;
        var vm = new Vue({
            el: "#vue-container",
            data:{
                tags: {!! $tags->toJson() !!},
                colors: {!! json_encode($colors) !!}
            }
        });
    </script>
@endsection