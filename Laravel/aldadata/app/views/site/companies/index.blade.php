@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Companies
            <div class="pull-right">
                <button
                    class="btn btn-small btn-black iframe"
                    data-type="companies"
                    data-action="create"
                    data-id="0">
                <span class="glyphicon glyphicon-plus-sign"></span> Create</button>
        </h3>
    </div>

    <table id="roles" class="table table-condensed table-hover">
        <thead>
            <tr>
                <th class="col-md-5">Name</th>
                <th class="col-md-5">Type</th>
                <th class="col-md-2 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@stop

{{-- Scripts --}}
@section('scripts')
    <script type="text/javascript">
        'use strict';
        var oTable;
        $(document).ready(function() {
                oTable = $('#roles').dataTable( {
                "sDom": "<'row'<'col-md-6'<'row'<'col-xs-6'l><'col-xs-6 text-right'r>>><'col-md-6'f>>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page"
                },
                "columnDefs": [{
                  "targets": -1,
                  "className": 'text-right'
                }],
                "bProcessing": true,
                "bServerSide": true,
                "iDisplayLength" : 10,
                "sAjaxSource": "{{ URL::to('companies/data') }}",
                /*"fnDrawCallback": function ( oSettings ) {
                    $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
                }*/
            });
        });

        window.oTable = oTable;
    </script>
@stop
