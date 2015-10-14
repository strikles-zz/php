'use strict';

var companies_table;
$(document).ready(function() {

    if(!$('#companies_table').length)
    {
        return false;
    }

    companies_table = $('#companies_table').dataTable({
        "dom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
        "ajax": "/admin/companies/data",
        "order": [[ 1, "asc" ]],
        "columnDefs": [
            { "visible": false, "targets": 0 }
        ],
        "columns": [
            {
                "data": "0"
            },{
                "data": "1",
                "render": function ( data, type, full, meta ) {
                    var curr_id = full[0];
                    return '<a href="/admin/companies/'+curr_id+'/show" class="iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+curr_id+'">'+data+'</a>';
                }
            }
        ]
    });

    //Activate an inline edit on click of a table cell
    $('#companies_table').on('click', 'tbody tr', function(e){
        var curr_id = companies_table.fnGetData(this)[0];
    });
});

