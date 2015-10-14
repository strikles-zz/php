@extends('site.layouts.modal')

{{-- Content --}}
@section('content')
	<p>Are you sure you want to detach {{ str_replace('Detach', '', $title) }}?</p>
@stop

@section('footer')
	<form id="deleteForm" class="form-horizontal" method="post" action="{{ Request::url() }}" autocomplete="off">

        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->

        <!-- ./ form actions -->
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-danger">DETACH</button>
    </form>
@stop