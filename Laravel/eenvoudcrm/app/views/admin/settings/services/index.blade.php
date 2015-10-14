@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Services</h3>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="services_table" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Status / Renewal Periodicity</th>
                <th>Billing Periodicity</th>
                <th>Default Costs</th>
                <th>Comment</th>
            </tr>
        </thead>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop