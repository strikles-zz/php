@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

    {{-- Delete User Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/delete') }}@endif" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
        <!-- ./ csrf token -->

@stop

@section('footer')

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <button class="btn btn-default close_popup" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete User</button>
            </div>
        </div>
        <!-- ./ form actions -->
    </form>

@stop