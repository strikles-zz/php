@extends('emails.layout')

@section('content')
    <p style="font-weight:bold; color:#000;">Dear {!! $guser['name'] !!}</p>
    <p style="color:#000;">You have received a $group['name'] group notification.</p>

    <label for="Subject">Subject: </label>
    <p style="color:#000;">{!! $all_input['message_subject'] !!}</p>

    <label for="Content">Content: </label>
    <p style="color:#000;">{!! $all_input['message_content'] !!}</p>
@endsection
