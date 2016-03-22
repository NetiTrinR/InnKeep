
<div class="col-sm-12 well">
    <!-- Name Form Input -->
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $item->name }}" readonly="" />
    </div>
    <!-- Description Form Input -->
    <div class="form-group">
        <label for="description" class="control-label">Description</label>
        <textarea name="description" rows="3" class="form-control" readonly>{{ $item->description }}</textarea>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <!-- Unit Form Input -->
            <div class="form-group">
                <label for="unit" class="control-label">Unit</label>
                <input type="text" name="unit" class="form-control" />
            </div>
        </div>
        <div class="col-sm-6">
            <!-- Quantity Form Input -->
                <div class="form-group">
                    <label for="quantity" class="control-label">Quantity</label>
                    <div class="input-group">
                        <input type="text" name="quantity" class="form-control" />
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-minus"></i></button>
                            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>