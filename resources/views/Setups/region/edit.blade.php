
<div class="form-group row">
    <input type="hidden" name="region_id" value="{{$region->id}}">
    <label for="name" class="control-label col-md-3 col-sm-12 col-xs-12">Region Name</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="text" id="name" name="name" class="form-control" value="{{$region->name}}" required>
    </div>
</div>