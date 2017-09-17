@extends('layouts.master')

@section('title','Home')

@section('content')
<section class="regular background">
	<div class="container">
	  <div class="row">
	      <div class="col-md-8 col-md-offset-2">
	          <div class="panel panel-default">
	              <div class="panel-heading">Owner Sign Up</div>

	              <div class="panel-body">
	                  <form class="form-horizontal" method="POST" action="{{ url('/owner/signup') }}">
	                      {{ csrf_field() }}

	                      <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
	                          <label for="firstname" class="col-md-4 control-label">First Name</label>

	                          <div class="col-md-6">
	                              <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

	                              @if ($errors->has('firstname'))
	                                  <span class="help-block">
	                                      <strong>{{ $errors->first('firstname') }}</strong>
	                                  </span>
	                              @endif
	                          </div>
	                      </div>

	                      <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
	                          <label for="lastname" class="col-md-4 control-label">Last Name</label>

	                          <div class="col-md-6">
	                              <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

	                              @if ($errors->has('lastname'))
	                                  <span class="help-block">
	                                      <strong>{{ $errors->first('lastname') }}</strong>
	                                  </span>
	                              @endif
	                          </div>
	                      </div>

	                      <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
	                          <label for="contact_number" class="col-md-4 control-label">Contact Number</label>

	                          <div class="col-md-6">
	                              <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}" required autofocus>

	                              @if ($errors->has('contact_number'))
	                                  <span class="help-block">
	                                      <strong>{{ $errors->first('contact_number') }}</strong>
	                                  </span>
	                              @endif
	                          </div>
	                      </div>

	                      <div class="form-group{{ $errors->has('business_role') ? ' has-error' : '' }}">
	                          <label for="business_role" class="col-md-4 control-label">Business Role</label>

	                          <div class="col-md-6">
	                              <select name="business_role" id="business_role" class="form-control" required="required">
	                               	<option value="Owner">Owner</option>
	                               	<option value="Manager">Manager</option>
	                               	<option value="Business Representative">Business Representative</option>
	                               </select>
	                          </div>
	                      </div>

	                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                          <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	                          <div class="col-md-6">
	                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

	                              @if ($errors->has('email'))
	                                  <span class="help-block">
	                                      <strong>{{ $errors->first('email') }}</strong>
	                                  </span>
	                              @endif
	                          </div>
	                      </div>

	                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                          <label for="password" class="col-md-4 control-label">Password</label>

	                          <div class="col-md-6">
	                              <input id="password" type="password" class="form-control" name="password" required>

	                              @if ($errors->has('password'))
	                                  <span class="help-block">
	                                      <strong>{{ $errors->first('password') }}</strong>
	                                  </span>
	                              @endif
	                          </div>
	                      </div>

	                      <div class="form-group">
	                          <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	                          <div class="col-md-6">
	                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                          </div>
	                      </div>

	                      <div class="form-group">
	                          <div class="col-md-6 col-md-offset-4">
	                              <button type="submit" class="btn btn-primary">
	                                  Sign up
	                              </button>
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
