'use strict';

/**
 * [DtAccountingOptions description]
 */
var DtStrippenkaartenOptions = function() {
};


DtStrippenkaartenOptions.prototype = {

    /**
     * [getEditorFields - get editor init fields]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorFields: function(options) {

        var editor_fields = [
            {
                label: "ID:",
                name: 'strippenkaarten.id',
                type: "hidden"
            },{
                label: "Company:",
                name: 'strippenkaarten.company_id',
                type: "hidden"
            },{
                label: "Hours:",
                name: 'strippenkaarten.hours',
                type: 'hidden'
            },{
                label: "Type",
                name: 'strippenkaarten.type',
                type: 'select',
                ipOpts: function() {
                    return global.App.helpers.services.getByCategoryID("5");
                }
            },{
                label: "Price:",
                name: 'strippenkaarten.price'
            },{
                label: "Inv. ID:",
                name: 'strippenkaarten.invoice_id'
            },{
                label: "Inv. Code:",
                name: 'strippenkaarten.invoice_code'
            },{
                label: "Entry Date",
                name: 'strippenkaarten.entry_date',
                type: "date",
                def: function () { return new Date(); },
                dateFormat: $.datepicker.ISO_8601,
                dateImage: "/assets/datatables/extensions/Editor-1.3.3/images/calender.png"
            }
        ];

        return editor_fields;

    },
    /**
     * [getTableOptions - get table creation options]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getTableOptions: function(options, editor) {

        var self = this;

        var table_options = {

            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"strippenkaarten/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": [0,1] },
                { "sortable": false, "targets": [2,3,4,5,6,7] }
            ],
            columns: [
                {
                    "data": "strippenkaarten.id"
                },{
                    "data": "strippenkaarten.company_id"
                },{
                    "data": "strippenkaarten.hours"
                },{
                    "data": "minutes_left"
                },{
                    "data": "strippenkaarten.price"
                },{
                    "data": "strippenkaarten.invoice_id",
                    render: function ( data, type, full, meta ) {
                        var present_html = '';
                        if(data !== '0' && data !== null)
                        {
                            var invoice_url = "https://eenvoud-media.moneybird.nl/invoices/"+data;
                            present_html = '<a href="'+invoice_url+'" class="">'+data+'</a>';
                        }
                        return present_html;
                    }
                },{
                    "data": "strippenkaarten.invoice_code"
                },{
                    "data": "strippenkaarten.entry_date"
                },{
                    "data": "strippenkaarten.expiry_date"
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

                            var values = editor.edit(node[0], false).val();
                            delete(values['strippenkaarten.id']);

                            editor
                                .create({
                                    title: 'Duplicate '+values['strippenkaarten.id'],
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

module.exports = new DtStrippenkaartenOptions();
