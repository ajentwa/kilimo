
<div class="form-group row">
    <input type="hidden" name="district_id" value="{{$ward->district_id}}">
    <input type="hidden" name="ward_id" value="{{$ward->id}}">
    <label for="name" class="control-label col-md-3 col-sm-12 col-xs-12">Ward Name</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input id="name" name="name" class="form-control" value="{{$ward->name}}" type="text" required>
    </div>
</div>