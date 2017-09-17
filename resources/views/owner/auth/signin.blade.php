@extends('layouts.master')

@section('title','Owner - Sign In')

@section('content')
<section class="regular background">
	<div class="container">
	    <div class="row">
	        <div class="col-md-4 col-md-offset-4">
	            <div class="panel panel-primary">
	                <div class="panel-heading">Owner Sign In</div>

	                <div class="panel-body">
	                    <form class="form-horizontal" method="POST" action="signin">
	                        {{ csrf_field() }}

	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <div class="col-md-12">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <div class="col-md-12">
	                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-12">
	                                <div class="checkbox">
	                                    <label>
	                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
	                                    </label>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-12">
	                                <button type="submit" class="btn btn-primary btn-block">
	                                    Sign In
	                                </button>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <div class="col-md-12">
	                                <a href="{{ url('/owner/password/reset') }}" class="btn btn-link btn-block">
	                                    Forgot Password?
	                                </a>

	                                <a href="{{ url('/owner/signup') }}" class="btn btn-link btn-block">
	                                    No Account? Sign up now!
	                                </a>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
@endsection
