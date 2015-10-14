@extends('emails.layout')

@section('content')
    <h4 class="text-center">Dear {!! $user->name !!},</h4>
    <h4 class="text-center">You have been denied membership to the group {!! $group->name !!}</h4>
@endsection
