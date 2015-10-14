<!-- View stored in app/views/welcome.scout.php -->
@extends('layouts.main')

@section('main')

<div class="container">
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">

			@include('survey.parts.intro')
			@include('survey.parts.questionaire')

		</div>
	</div>
</div>

@stop
