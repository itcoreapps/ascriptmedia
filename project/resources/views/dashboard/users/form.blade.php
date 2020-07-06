@csrf

<div class="row">
    @php $input = 'name'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Username</label>
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
    @php $input = 'email'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Email</label>
        <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ isset($row) ? $row->{$input} : '' }}" name="{{$input}}" required>
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
    @php $input = 'phone'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Phone</label>
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
    @php $input = 'address'; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Address</label>
        <textarea name="{{$input}}" id="" cols="30" rows="2" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}">{{isset($row) ? $row->{$input} : ''}}</textarea>
        </div>
    </div>              
</div>
<hr>

<div class="row">
    @php $input = 'password'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="{{$input}}">
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
    @php $input = 'userType'; @endphp
    <div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">User Group</label>
        <select name="{{ $input }}" class="form-control{{ $errors->has($input) ? ' is-invalid' : '' }}" >
            <option value="0" {{ isset($row) && $row[$input] == '0' ? 'selected' : ''}}>Admin</option>
            <option value="1" {{ isset($row) && $row[$input] == '1' ? 'selected' : ''}}>User</option>
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
