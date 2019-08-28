
<div class="form-group row">
    <input type="hidden" name="unit_id" value="{{$unit->id}}">
    <label for="unit" class="control-label col-md-3 col-sm-12 col-xs-12">Unit Name</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="text" id="unit" name="name" class="form-control" value="{{$unit->name}}" required>
    </div>
</div>