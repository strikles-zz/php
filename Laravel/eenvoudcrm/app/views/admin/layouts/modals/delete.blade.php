@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<p>Are you sure you want to delete {{ $model->name }}?</p>
@stop

@section('footer')
	<form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($model)){{ URL::to( 'admin/' . $name . '/' . $model->id . '/delete') }}@endif" autocomplete="off">

        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $model->id }}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->

        <!-- ./ form actions -->
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-danger">DELETE</button>
    </form>
@stop
