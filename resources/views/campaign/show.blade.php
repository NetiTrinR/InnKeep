@extends('layouts._app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $campaign->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Search...</th>
                            </thead>
                            <tbody>
                                @foreach($characters as $key => $character)
                                    <tr>
                                        <td>{{ $character->name }}</td>
                                        <td>Results?</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Journals
                    </h3>
                </div>
                <div class="panel-body">
                    <!-- Entry Form Input -->
                    <div class="form-group">
                        <label for="entry" class="control-label">Notes</label>
                        <textarea name="entry" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-xs-11 text-right" style="line-height: 46px;">
                            Automatically hidden and set to this campaign.
                        </div>
                        <div class="col-xs-1">
                            <button type="submit" class="btn btn-success pull-right">Save</button>
                        </div>
                    </div>
                    @if($journals->count())
                        @each('partials._journalEntry', $journals, 'entry')
                    @else
                        <p class="text-center">
                            <span class="lead">Ye fiends are away</span><br />
                        </p>
                    @endif
                    {!! $journals->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection