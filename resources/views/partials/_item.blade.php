<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- Name Form Input -->
            <div class="form-group form-group-sm">
                <label for="name" class="control-label">Name</label>
                <p class="form-control-static">{{ $item->name }}</p>
            </div>
            @if(isset($item->description))
                <!-- Description Form Input -->
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <p class="form-control-static">{{ $item->description }}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-6">
                    <!-- Quantity Form Input -->
                        <div class="form-group">
                            <label for="quantity" class="control-label">Quantity</label>
                            <div class="input-group">
                                <input type="text" name="quantity" class="form-control input-sm" value="{{ $item->quantity }}" />
                                <div class="input-group-btn ">
                                    <button type="button" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-minus"></i></button>
                                    <button type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-sm-6">
                    <!-- Unit Form Input -->
                    <div class="form-group">
                        <label for="unit" class="control-label">Unit</label>
                        <input type="text" name="unit" class="form-control input-sm" value="{{ $item->unit }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>