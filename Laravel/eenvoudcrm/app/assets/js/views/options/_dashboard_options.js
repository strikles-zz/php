'use strict';

/**
 * [DtAccountingOptions description]
 */
var DtDashboardOptions = function() {
};


DtDashboardOptions.prototype = {

    /**
     * [getEditorFields]
     * @return {[type]} [description]
     */
    getEditorFields: function() {

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
                label: "Company ID:",
                name: 'worklogs.company_id',
                type: "select"
            },{
                label: "Project ID:",
                name: 'worklogs.project_id',
                type: "select"
            },{
                label: "User ID:",
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
                default: 1,
                ipOpts: [ {label: "", value: 1} ],
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
     * [getTableOptions description]
     * @return {[type]} [description]
     */
    getTableOptions: function(editor) {

        var self = this;
        var table_options = {
            ajax: "/admin/werklogs/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": 0 },
                { "sortable": false, "targets": [1,2,3,4,5,6,7,8,9,10,11] }
            ],
            columns: [
                {
                    data: "worklogs.id"
                },{
                    data: "worklogs.date"
                },{
                    data: "worklogs.company_id",
                    render: function ( data, type, full, meta ) {
                        //console.log(full);
                        return full.companies.bedrijfsnaam;
                    }
                },{
                    data: "worklogs.project_id",
                    defaultContent: "undefined",
                    render: function ( data, type, full, meta ) {
                        //console.log(full);
                        return full.projects.name;
                    }
                },{
                    data: "worklogs.strippenkaarten_id",
                    defaultContent: "undefined",
                    render: function ( data, type, full, meta ) {
                        //console.log('strip_debug', data, full);
                        return '<input type="checkbox" name="strippenkaarten_id" value="'+data+'" '+(data > 0 ? 'checked' : '')+'>';
                    }
                },{
                    data: "worklogs.user_id",
                    render: function ( data, type, full, meta ) {
                        //console.log(full);
                        return full.users.username;
                    }
                },{
                    data: "worklogs.minutes"
                },{
                    data: "worklogs.description"
                },{
                    data: "worklogs.comment"
                },{
                    data: "worklogs.billable",
                    render: function ( data, type, full, meta ) {
                        return '<input type="checkbox" name="billable" value="'+data+'" '+(data > 0 ? 'checked' : '')+'>';
                    }
                },{
                    data: "worklogs.processed",
                    render: function ( data, type, full, meta ) {
                        return '<input type="checkbox" name="processed" value="'+data+'" '+(data > 0 ? 'checked' : '')+'>';
                    }
                },{
                    data: null,
                    type: "html",
                    "defaultContent": '<a href="" class="btn btn-xs btn-default editor_2x">2x</a> <a href="" class="btn btn-xs btn-primary editor_edit">E</a> <a href="" class="btn btn-xs btn-danger editor_remove">D</a>'
                }
            ],
            tableTools: {
                sRowSelect: "single",
                aButtons: [
                    { sExtends: "editor_create", "editor": editor }
                ]
            }
        };

        return table_options;
    }
};

module.exports = new DtDashboardOptions();
