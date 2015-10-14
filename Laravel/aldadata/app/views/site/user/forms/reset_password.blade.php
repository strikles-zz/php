<div class="forgot_passwd form-group">
	<form method="POST" action="{{ URL::to('user/reset') }}" accept-charset="UTF-8">
	    <input type="hidden" name="token" value="{{ $token }}">
	    <input type="hidden" name="_token" value="{{ Session::get('_token') }}">

	    <div class="form-group">
	        <label for="password">Password</label>
	        <input class="form-control" placeholder="Password" type="password" name="password" id="password">
	    </div>
	    <div class="form-group">
	        <label for="password_confirmation">Confirm Password</label>
	        <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
	    </div>
	    <div class="form-actions form-group">
	        <button type="submit" class="btn btn-default">Continue</button>
	    </div>
	</form>
</div>