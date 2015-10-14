@extends('layouts.main')

@section('main')

    <div id="login">
        <form role="form" method="post">
            <div class="form-group">
                <label for="token">Token</label>
                <input type="text" class="form-control" id="token">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>

@stop

@section('sidebar')
@stop
