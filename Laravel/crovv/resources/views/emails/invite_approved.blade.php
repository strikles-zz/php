@extends('emails.layout')

@section('content')
    <h4 class="text-center">Dear {!! $user['name'] !!},</h4>
    <h4 class="text-center">You have been approved membership to the group {!! $group['name'] !!}</h4>

    <h4>Group Details</h4>

    <label for="Description">Description</label>
    <p name="description">{!! $group['description'] !!}</p>

    <label for="Description">Language</label>
    <p name="description">{!! $group['language'] !!}</p>

    <label for="weekly_meeting">Weekly meeting</label>
    <p name="weekly_meeting">{!! $group['meeting_weekday'].', '.$group['meeting_time'] !!}</p>
@endsection
