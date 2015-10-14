@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Strippenkaarten</h3>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="strippenkaarten_table" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Service</th>
                <th>Description</th>
                <th>Monthly Price</th>
                <th>Start</th>
                <th>End</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop
