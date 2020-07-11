@csrf

<div class="row">
    @php $input = 'p_name'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" required autofocus>
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div>              
</div>
<hr>

<div class="row">
    @php $input = 'p_price_egp'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Price of Egy</label>
            <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}">
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div>              
</div>
<hr>

<div class="row">
    @php $input = 'p_price_dollar'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Price of Dollar</label>
            <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}">
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div>              
</div>
<hr>

<div class="row">
    @php $input = 'p_price_bitcoins'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Price of Bitcoins</label>
            <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}">
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div>              
</div>
<hr>


<div class="row">
    @php $input = 'img_path[]'; @endphp

    <div class="input-group control-group increment">
        
            <label style="margin: 10px">Product Image</label>
            <input type="file" class="form-control" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" >
            <div class="input-group-btn"> 
                <button class="btn btn-primary" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
        
        
    </div>

    <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
        <input type="file" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
    </div>

</div>
<hr>


<div class="row">
    @php $input = 'p_video'; @endphp
    <div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Product Video</label>
        <input type="url" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}">
        @if ($errors->has($input))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($input) }}</strong>
            </span>
        @endif
    </div>
    </div>                                
</div>
<hr>

<div class="row">
    @php $input = 'num_of_sales'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Number Of Sales</label>
            <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}">
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div>              
</div>
<hr>

<div class="row">
    @php $input = 'p_description'; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Description</label>
        <input type="text" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" required autofocus>
        @if ($errors->has($input))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($input) }}</strong>
            </span>
        @endif
    </div>
</div>              
</div>
<hr>

<div class="row">
        
    <div class="col-md-6">
        @php $input = 'cat_id'; @endphp
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category</label>
            <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" >
                @foreach ($cats as $cat)
                <option value="{{ $cat->c_id }}" {{ isset($row) && $row[$input] == $cat->c_id ? 'selected' : ''}}>{{$cat->c_name}}</option>
                    
                @endforeach
            </select>
            @if ($errors->has($input))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($input) }}</strong>
                </span>
            @endif
        </div>
    </div> 
</div>
<hr>
