@extends('app')

@section('header')
	<div class="home-header">
		<h4 class="text-center">Groups</h4>
	</div>
@endsection

@section('content')
	<div class="content container">
		{!! var_dump($errors) !!}
	</div>
@endsection
