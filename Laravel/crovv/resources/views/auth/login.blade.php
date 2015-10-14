@extends('app')

@section('header')
<div class="home-header">
	<p class="header-text text-center">Login</p>
</div>
@endsection

@section('content')

	<div class="content">

		<div class="container login-wrapper">
			<div class="row">

				<div class="col-xs-10 col-xs-offset-1">
					<div class="row">

						<div class="col-xs-12 col-sm-6 col-lg-3 top-gap">

							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif

							<form class="form-horizontal" role="form" method="POST" action="/auth/login">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

								<div class="form-group">
									<label class="control-label">Username</label>
									<input type="email" class="form-control" name="email" value="{{ old('email') }}" tabindex="1">
									<a href="/password/email" class="forgot">Forgot Your Username?</a>
								</div>

								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" class="form-control" name="password" tabindex="2">
									<a href="/password/email" class="forgot">Forgot Your Password?</a>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary top-gap" style="margin-right: 15px;">Login</button>
								</div>
							</form>

						</div>

						<div class="col-xs-12 col-sm-5 col-sm-offset-1 col-lg-3 col-lg-offset-1 top-gap">
							<h4>Of meld u aan via</h4>
							<div class="row">
								<div class="col-xs-3">
									<div class="icon-linkedin">in</div>
								</div>
								<div class="col-xs-9" style="padding-left: 0">
									<a href="/linkedin" class="text" style="line-height: 3rem">Linkedin</a>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-lg-5 top-gap">
							<div class="grey-container row">
								<div class="col-xs-12">
									<h4>Or register for free</h4>
									<div class="row top-gap">
										<div class="col-xs-3">
											{!! Html::image('images/circular/webcam.png', null, array('class' => 'img-responsive group_logo')) !!}
										</div>
										<div class="col-xs-9 lighter-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </div>
									</div>
									<div class="row top-gap">
										<div class="col-xs-3">
											{!! Html::image('images/circular/text.png', null, array('class' => 'img-responsive group_logo')) !!}
										</div>
										<div class="col-xs-9 lighter-sm">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim </div>
									</div>
									<div class="row top-gap">
										<div class="col-xs-3">
											{!! Html::image('images/circular/world.png', null, array('class' => 'img-responsive group_logo')) !!}
										</div>
										<div class="col-xs-9 lighter-sm">veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea </div>
									</div>
									<div class="row top-gap">
										<div class="col-xs-3">
											{!! Html::image('images/circular/archive.png', null, array('class' => 'img-responsive group_logo')) !!}
										</div>
										<div class="col-xs-9 lighter-sm">commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit</div>
									</div>
									<a href="/auth/register" class="btn btn-register top-gap">Register</a>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
