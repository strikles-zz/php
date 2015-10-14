@extends('app')

@section('content')
  <div class="container" data-session={{ Session::getToken() }}>
    {!! $page_content !!}
  </div>
@endsection
