'use strict';

/**
 * [DtProjectsOptions description]
 */
var DtProjectsOptions = function() {
};


DtProjectsOptions.prototype = {

	/**
     * [getEditorFields - editor fields configuration]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorFields: function(options) {

        var editor_fields = [
            {
                label: "ID:",
                name: 'projects.id',
                type: "hidden"
            },{
                label: "Company:",
                name: 'projects.company_id',
                type: (options && options.view === 'company' ? "hidden" : "select")
            },{
                label: "Name:",
                name: 'projects.name'
            },{
                label: "Description",
                name: 'projects.description'
            },{
                label: "Comment",
                name: 'projects.comment'
            },{
                label: "Jira:",
                name: 'projects.jira_id'
            },{
                label: "Status",
                name: 'projects.status'
            }
        ];

        return editor_fields;
    },

    /**
     * [getTableOptions - setup editor initialization options]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getTableOptions: function(options, editor) {

        var self = this;

        var table_options = {
            pageLength: 10,
            ajax: "/admin/"+(options && options.view === "company" ? "companies/"+options.company_id+"/" : "")+"projects/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": (options && options.view === "company" ? [0, 1] : [0]) },
                { "sortable":false, "targets": (options && options.view === "company" ? [2,3,4,5,6] : [1,2,3,4,5,6]) }
            ],
            columns: [
                {
                    "data": "projects.id"
                },{
                    "data": "projects.company_id",
                    "render": function ( data, type, full, meta ) {
                        return (options && options.view === "company" ? data : full.companies.bedrijfsnaam);
                        //return data;
                    }
                },{
                    "data": "projects.name"
                },{
                    "data": "projects.description"
                },{
                    "data": "projects.comment"
                },{
                    "data": "projects.jira_id"
                },{
                    "data": "projects.status"
                }
            ],
            tableTools: {
                sRowSelect: "multi",
                aButtons: [
                    { sExtends: "editor_create", editor: editor },
                    { sExtends: "editor_edit",   editor: editor },
                    {
                        sExtends:    "select_single",
                        sButtonText: "2x",
                        fnClick:     function( button, config ) {

                            var node = this.fnGetSelected();
                            if (node.length !== 1) {
                                return;
                            }

                            // Place the selected row into edit mode (but hidden),
                            // then get the values for all fields in the form
                            var values = editor.edit(node[0], false).val();
                            delete(values['projects.id']);

                            // Create a new entry (discarding the previous edit) and
                            // set the values from the read values
                            editor
                                .create({
                                    title: 'Duplicate '+values['projects.id'],
                                    buttons: 'Create from existing'
                                })
                                .set(values);
                        }
                    },
                    { sExtends: "editor_remove", editor: editor }
                ]
            }
        };

        return table_options;
    }
};

module.exports = new DtProjectsOptions();
