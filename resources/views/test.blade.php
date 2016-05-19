@extends('layouts._app')

@section('content')
    <!-- Search Form Input -->
    <div class="form-group">
        <label for="search" class="control-label">Search</label>
        <input id="search" type="text" name="search" class="form-control" />
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <pre id="output"></pre>
        </div>
    </div>
@endsection

@section('footer.scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/2.2.0/fuse.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var characters = [{
                "id": 1,
                "name": "Keehla",
                "user": "Michael Manning",
                "campaign": "zestaze"
            },
            {
                "id": 2,
                "name":"Clerryn Lulen",
                "user":"Adam Sullivan",
                "campaign":"Zestaze"
            },
            {
                "id": 3,
                "name":"Balendyl Liapetor",
                "user":"Alvin Fry",
                "campaign":"Hotheocia"
            },
            {
                "id": 4,
                "name":"Uanzaphir Qinrona",
                "user":"Theodore Hess",
                "campaign":"Aplana"
            },
            {
                "id": 5,
                "name":"Malrath Balxina",
                "user":"Roosevelt Brock",
                "campaign":"Zestaze"
            },
            {
                "id": 6,
                "name":"Zylphon Neriwraek",
                "user":"Willie Willis",
                "campaign":"Hotheocia"
            },
            {
                "id": 7,
                "name":"Watidon Sylneiros",
                "user":"Louis Edwards",
                "campaign":"Aplana"
            },
            {
                "id": 8,
                "name":"Permorn Trisnelis",
                "user":"Kenneth Talley",
                "campaign":"Zestaze"
            },
            {
                "id": 9,
                "name":"Gernos Carwraek",
                "user":"Michael Manning",
                "campaign":"Hotheocia"
            },
            {
                "id": 10,
                "name":"Nichlather Umevyre",
                "user":"Adam Sullivan",
                "campaign":"Aplana"
            },
            {
                "id": 11,
                "name":"Cristhath Keahice",
                "user":"Alvin Fry",
                "campaign":"Zestaze"
            }];
            var options = {
                id: "id",
                caseSensitive: false,
                includeScore: true,
                shouldSort: true,
                tokenize: true,
                threshold: 0.6,
                location: 0,
                distance: 100,
                verbose: true,
                maxPatternLength: 32,
                keys: ["name", "user", "campaign"]
            }
            var fuse = new Fuse(characters, options);
            $(document).on('keyup', '#search',function(e){
                var results = fuse.search($("#search").val());
                // console.log(results);
                $("#output").html(JSON.stringify(results));
            });
        });
    </script>
@endsection