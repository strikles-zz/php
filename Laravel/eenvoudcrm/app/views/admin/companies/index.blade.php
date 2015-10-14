@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Companies</h3>
    </div>

    <table id="companies_table" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop