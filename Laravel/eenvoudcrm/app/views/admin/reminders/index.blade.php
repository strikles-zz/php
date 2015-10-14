@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Reminders</h3>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="reminders_table" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project</th>
                <th>User</th>
                <th>Description</th>
            </tr>
        </thead>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop
