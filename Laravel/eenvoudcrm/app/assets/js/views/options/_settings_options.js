'use strict';

/**
 * [DtAccountingOptions description]
 */
var DtSettingsOptions = function() {
};


DtSettingsOptions.prototype = {

    /**
     * [getEditorFields - get editor fields]
     * @return {[type]} [description]
     */
    getEditorFields: function() {

        var editor_fields = [
            {
                label: "ID:",
                name: 'services.id',
                type: "hidden"
            },{
                label: "Name:",
                name: 'services.name'
            },{
                label: "Category:",
                name: 'services.category_id',
                type: "select"
            },{
                label: "Renewal Periodicity:",
                name: 'services.status_id',
                type: "select"
            },{
                label: "Invoice Periodicity:",
                name: 'services.invoice_periods_id',
                type: "select"
            },{
                label: "Price",
                name: 'services.default_monthly_costs'
            },{
                label: "Comment",
                name: 'services.comment'
            }
        ];

        return editor_fields;
    },
    /**
     * [getTableOptions - get table init options]
     * @return {[type]} [description]
     */
    getTableOptions: function(editor) {

        var self = this;
        var table_options = {
            ajax: "/admin/settings/services/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": 0 }, {"sortable":false, "targets": [1,2,3,4]}
            ],
            columns: [
                {
                    "data": "services.id"
                },{
                    "data": "services.name"
                },{
                    "data": "services.category_id",
                    "render": function ( data, type, full, meta ) {
                        return full.service_categories.name;
                    }
                },{
                    "data": "services.status_id",
                    "render": function ( data, type, full, meta ) {
                        //console.log('full', full);
                        return full.statuses.description;
                    }
                },{
                    "data": "services.invoice_periods_id",
                    "render": function ( data, type, full, meta ) {
                        console.log('full', full);
                        return full.invoice_periods.description;
                    }
                },{
                    "data": "services.default_monthly_costs"
                },{
                    "data": "services.comment"
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

                            // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                            var values = editor.edit( node[0], false ).val();
                            delete(values['services.id']);

                            // Create a new entry (discarding the previous edit) and set the values from the read values
                            editor
                                .create({
                                    title: 'Duplicate Service',
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

module.exports = new DtSettingsOptions();
