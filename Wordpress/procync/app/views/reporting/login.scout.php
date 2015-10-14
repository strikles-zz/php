<!-- View stored in app/views/welcome.scout.php -->
@extends('layouts.main')

@section('main')

  	<div class="login" style="position: absolute; top: 10rem; left: 0; bottom: 0; right: 0;">

        <div class="row intro-logo">
            <div class="col-xs-12 text-center">
                <img src="/content/themes/procync/app/assets/images/logo.png" alt="Procync">
            </div>
        </div>

    	<div class="row login-content">
    		<div class="col-sm-4 col-sm-offset-4 col-lg-2 col-lg-offset-5 text-center">
    			<div class="login-welcome">Welcome to Procync</div>
    			{{ wp_login_form([

					'label_username' => __( '' ),
					'label_password' => __( '' ),
					'remember'       => false

    			]) }}
    		</div>
    	</div>

    </div>

    <script>
    (function($)
    {
    	'use strict';
	    $('#user_login').attr('placeholder', 'E-mailadres');
	    $('#user_pass').attr('placeholder', 'Password');
	    $('label').remove();

	    var login_height = $('.login').height();
	    var margin_top = ($(window).height()/2) - (login_height/2) - 50;
	    $('.login').css({'margin-top': margin_top});
        $('.login-submit').prepend('<img src="/content/themes/procync/app/assets/images/next-blue.png" alt="Next" style="float: right;">');

    })(jQuery)
    </script>

@stop

