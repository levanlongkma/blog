@extends('layouts.app')

@section('content')
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              <h1>Login Form</h1>
              {{csrf_field()}}
              <div class="{{ $errors->has('user_name') ? ' has-error' : '' }}">
                <input id="user_name" type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" required autofocus>
                @if ($errors->has('user_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user_name') }}</strong>
                    </spanuser_name                @endif
              </div>
              <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div>
                <button class="btn btn-defaut " type="submit">Login</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
@endsection

