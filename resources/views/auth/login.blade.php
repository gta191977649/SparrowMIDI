@extends('layouts.app')

@section('content')
    <h1 class="text-primary">登錄</h1>
    <hr/>
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">電郵</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" >密碼</label>

        
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
       
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
            記住我
            </label>
            <a class="btn btn-link" href="{{ route('password.request') }}">
            密碼忘記了?
        </a>
        </div>
        
        <button type="submit" class="btn btn-primary">登錄</button>
     

      

    </form>

@endsection
