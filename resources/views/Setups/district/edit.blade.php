

<div class="form-group row">
    <input type="hidden" name="region_id" value="{{$district->region_id}}">
    <input type="hidden" name="district_id" value="{{$district->id}}">
    <label for="name" class="control-label col-md-3 col-sm-12 col-xs-12">District Name</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input id="name" name="name" class="form-control" value="{{$district->name}}" type="text" required>
    </div>
</div>