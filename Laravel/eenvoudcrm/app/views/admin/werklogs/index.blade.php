@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header row">
        <div class="col-sm-10">
            <h3>Worklogs</h3>
        </div>
        <div class="col-sm-2">
            <a href="#" class="btn btn-default pull-right fetch-roadmap">Fetch Roadmap Entries</a>
        </div>
    </div>

    <table cellpadding="0" cellspacing="0" border="0" class="display" id="werklogs_table" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th width="60">Company</th>
                <th width="30">Date</th>
                <th width="80">Project</th>
                <th width="15">Strip</th>
                <th width="15">User</th>
                <th width="10">Min</th>
                <th width="140">Description</th>
                <th width="40">Comment</th>
                <th width="5">B?</th>
                <th width="5">P?</th>
                <th width="70">Actions</th>

            </tr>
        </thead>
    </table>

    <div class="userdump">{{ Auth::user()->id }}</div>
@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop
