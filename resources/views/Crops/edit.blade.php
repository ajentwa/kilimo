
<div class="form-group row">
    <input type="hidden" name="crop_id" value="{{$crop->id}}">
    <label for="crop" class="control-label col-md-3 col-sm-12 col-xs-12">Crop Name</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="text" id="crop" name="crop_name" class="form-control" value="{{$crop->crop_name}}" required>
    </div>
</div>
<div class="form-group row">
    <label for="unit" class="control-label col-md-3 col-sm-12 col-xs-12">Crop Unit</label>
    <select class="form-control" name="unit_id" id="unit" required>
        <option value="{{$crop->unit_id}}">{{$crop->unit['name']}}</option>
        @foreach ($units as $unit)
            <option value="{{$unit->id}}">{{$unit->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group row">
    <label for="farmer" class="control-label col-md-3 col-sm-12 col-xs-12">Crop Farmer</label>
    <select class="form-control" name="farmer_id" id="farmer" required>
        <option value="{{$crop->farmer_id}}">{{$crop->farmer['first_name'].' '.$crop->farmer['surname']}}</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->first_name.' '.$user->surname}}</option>
        @endforeach
    </select>
</div>
<div class="form-group row">
    <label for="year" class="control-label col-md-3 col-sm-12 col-xs-12">Crop Year</label>
    <select class="form-control" name="year_id" id="year" required>
        <option value="{{$crop->year_id}}">{{$crop->year['name']}}</option>
        @foreach ($years as $year)
            <option value="{{$year->id}}">{{$year->name}}</option>
        @endforeach
    </select>
</div>