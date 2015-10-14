@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Projects</h3>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="projects_table" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Name</th>
                <th>Description</th>
                <th>Comment</th>
                <th>Jira</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop
