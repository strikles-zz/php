'use strict';

/**
 * [DtAccountingOptions description]
 */
var DtWorklogsOptions = function() {
};


DtWorklogsOptions.prototype = {

    /**
     * [getEditorFields]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorFields: function(options) {

        var editor_fields = [
            {
                label: "ID:",
                name: 'worklogs.id',
                type: "hidden"
            },{
                label: "Date",
                name: 'worklogs.date',
                type: "date",
                def: function () { return new Date(); },
                dateFormat: $.datepicker.ISO_8601,
                dateImage: "/assets/datatables/extensions/Editor-1.3.3/images/calender.png"
            },{
                label: "Company",
                name: 'worklogs.company_id',
                type: (options && options.view === 'company' ? "hidden" : "select")
                //onblur: 'submit'
            },{
                label: "Project",
                name: 'worklogs.project_id',
                type: "select"
            },{
                label: "User",
                name: 'worklogs.user_id',
                type: "select"
            },{
                label: "Minutes",
                name: 'worklogs.minutes'
            },{
                label: "Description",
                name: 'worklogs.description'
            },{
                label: "Comment",
                name: 'worklogs.comment'
            },{
                label: "Billable",
                name: 'worklogs.billable',
                type: 'checkbox',
                ipOpts: [ {label: "", value: 1} ],
                default: 1,
                separator: "|"
            },{
                label: "Processed",
                name: 'worklogs.processed',
                type: 'checkbox',
                ipOpts: [ {label: "", value: 1} ],
                separator: "|"
            }
        ];

        return editor_fields;
    },

    /**
     * [getTableOptions]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getTableOptions: function(options, editor) {

        var self = this;
        var table_options = {
            "ajax": "/admin/"+(options && options.view === "company" ? "companies/"+options.company_id+"/" : "")+"werklogs/data",
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                { "visible": false, "targets": (options && options.view === "company" ? [0,1] : [0]) },
                { "sortable":false, "targets": (options && options.view === "company" ? [2,3,4,5,6,7,8,9,10] : [1,2,3,4,5,6,7,8,9,10]) },
                { "data": null, "targets": 11, "defaultContent": '<a href="" class="btn btn-xs btn-default editor_2x">2x</a> <a href="" class="btn btn-xs btn-primary editor_edit">E</a> <a href="" class="btn btn-xs btn-danger editor_remove">D</a>'}
            ],
            "columns": [
                {
                    "data": "worklogs.id"
                },{
                    "data": "worklogs.company_id",
                    "render": function ( data, type, full, meta ) {
                        return (options && options.view === "company" ? data : full.companies.bedrijfsnaam);
                    }
                },{
                    "data": "worklogs.date"
                },{
                    "data": "worklogs.project_id",
                    "defaultContent": "undefined",
                    "render": function ( data, type, full, meta ) {
                        //console.log(full.projects);
                        return full.projects.name;
                    }
                },{
                    "data": "worklogs.strippenkaarten_id",
                    "render": function ( data, type, full, meta ) {
                        //console.log('strip_debug', data, full);
                        return '<input type="checkbox" name="strippenkaarten_id" value="'+data+'" '+(data > 0 ? 'checked' : '')+'>';
                    }
                },{
                    "data": "worklogs.user_id",
                    "render": function ( data, type, full, meta ) {
                        //console.log(full);
                        return full.users.username;
                    }
                },{
                    "data": "worklogs.minutes"
                },{
                    "data": "worklogs.description"
                },{
                    "data": "worklogs.comment"
                },{
                    "data": "worklogs.billable",
                    "render": function ( data, type, full, meta ) {
                        return '<input type="checkbox" name="billable" value="'+data+'" '+(data > 0 ? 'checked' : '')+'>';
                    }
                },{
                    "data": "worklogs.processed",
                    "render": function ( data, type, full, meta ) {
                        return '<input type="checkbox" name="processed" value="'+data+'" '+(data > 0 ? 'checked' : '')+'>';
                    }
                }
            ],
            "tableTools": {
                "sRowSelect": "single",
                "aButtons": [
                    { "sExtends": "editor_create", "editor": editor }
                ]
            }
        };

        return table_options;
    }
};

module.exports = new DtWorklogsOptions();
