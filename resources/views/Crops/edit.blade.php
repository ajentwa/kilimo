<div class="form-group row">
    <input type="hidden" name="crop_id" value="{{$crop->id}}">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label for="name" class="control-label">Crop Name</label>
        <input type="text" id="name" name="crop_name" class="form-control" value="{{$crop->crop_name}}" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label for="quantity" class="control-label">Crop Quantity</label>
        <input type="text" id="quantity" name="quantity" class="form-control" value="{{$crop->quantity_remained}}" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <label class="control-label" for="unit">Crop Unit</label>
        <select class="form-control dd_select" name="unit_id" id="unit" required style="width: 100%">
            <option value="">---</option>
            @foreach ($units as $unit)
                <option value="{{$unit->id}}" {{$crop->unit_id == $unit->id ? 'selected':''}}>{{$unit->name}}</option>
            @endforeach
        </select>
    </div>
</div>
