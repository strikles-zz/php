'use strict';

/**
 * [DtAccountingOptions description]
 */
var DtSubscriptionsOptions = function() {
};


DtSubscriptionsOptions.prototype = {

    /**
     * [getEditorFields - get editor init fields]
     * @param  {[type]} type    [description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorFields: function(type, options) {

        var editor_fields;
        if(type === "subscriptions") {

            editor_fields = [
                {
                    label: "ID",
                    name: 'subscriptions.id',
                    type: "hidden"
                },{
                    label: "Company",
                    name: 'subscriptions.company_id',
                    type: (options && options.view === 'company' ? "hidden" : "select")
                },{
                    label: "Service Category",
                    name: 'service_categories.id',
                    type: "select"
                },{
                    label: "Service",
                    name: 'subscriptions.service_id',
                    type: "select"
                },{
                    label: "Description",
                    name: 'subscriptions.description'
                },{
                    label: "Price",
                    name: 'subscriptions.price'
                },{
                    label: "Total Price",
                    name: 'subscriptions.total_price'
                },{
                    label: "Start Date",
                    name: 'subscriptions.subscription_start',
                    type: "date",
                    dateFormat: $.datepicker.ISO_8601,
                    dateImage: "/assets/datatables/extensions/Editor-1.3.3/images/calender.png"
                },{
                    label: "End Date",
                    name: 'subscriptions.subscription_end',
                    type: "date",
                    dateFormat: $.datepicker.ISO_8601,
                    dateImage: "/assets/datatables/extensions/Editor-1.3.3/images/calender.png"
                },{
                    label: "Invoice ID",
                    name: 'subscriptions.invoice_id'
                },{
                    label: "Invoice Periodicity",
                    name: 'subscriptions.invoice_periods_id',
                    type: "select"
                },{
                    label: "Renewal Periodicity",
                    name: 'subscriptions.status_id',
                    type: "select"
                },{
                    label: "Status Date",
                    name: 'subscriptions.status_date',
                    type: "date",
                    dateFormat: $.datepicker.ISO_8601,
                    dateImage: "/assets/datatables/extensions/Editor-1.3.3/images/calender.png"
                }
            ];

        } else if(type === "renewals") {

            editor_fields = [
                {
                    label: "ID",
                    name: 'subscriptions.id',
                    type: "hidden"
                },{
                    label: "Company",
                    name: 'subscriptions.company_id',
                    type: "hidden"
                }
            ];

        } else if(type === "nieuwsbrieven") {

            editor_fields = [
                {
                    label: "ID",
                    name: 'subscriptions.id',
                    type: "hidden"
                },{
                    label: "Company",
                    name: 'subscriptions.company_id',
                    type: "hidden"
                },{
                    label: "AWS account",
                    name: 'subscriptions.aws_auth'
                }
            ];
        }

        return editor_fields;
    },
    /**
     * [getSubscriptionsTableOptions]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getSubscriptionsTableOptions: function(options, editor) {

        var self = this;
        var table_options = {
            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": (options && options.view === 'company' ? [0,1] : [0]) },
                { "sortable": false, "targets": (options && options.view === 'company' ? [2,3,4,5,6,7,8,9,10,11] : [1,2,3,4,5,6,7,8,9,10,11]) }
            ],
            columns: [
                {
                    "data": "subscriptions.id"
                },{
                    "data": "subscriptions.company_id",
                    "render": function ( data, type, full, meta ) {
                        return (options && options.view === "company" ? data : full.companies.bedrijfsnaam);
                    }
                },{
                    "data": "service_categories.id",
                    "render": function ( data, type, full, meta ) {
                        return full.service_categories.name;
                    }
                },{
                    "data": "subscriptions.service_id",
                    "render": function ( data, type, full, meta ) {
                        return full.services.name;
                    }
                },{
                    "data": "subscriptions.description"
                },{
                    "data": "subscriptions.price",
                    "render": function ( data, type, full, meta ) {
                        return '&euro; '+data;
                    }
                },{
                    "data": "subscriptions.total_price",
                    "render": function ( data, type, full, meta ) {
                        return '&euro; '+data;
                    }
                },{
                    "data": "subscriptions.subscription_start"
                },{
                    "data": "subscriptions.subscription_end"
                },{
                    "data": "subscriptions.invoice_id",
                    "render": function ( data, type, full, meta ) {
                        var present_html = '';
                        if(data !== '0' && data !== null)
                        {
                            var invoice_url = "https://eenvoud-media.moneybird.nl/invoices/"+data;
                            present_html = '<a href="'+invoice_url+'" class="">'+data+'</a>';
                        }

                        return present_html;
                    }
                },{
                    "data": "subscriptions.invoice_periods_id",
                    "render": function ( data, type, full, meta ) {
                        return full.invoice_periods.description;
                    }
                },{
                    "data": "subscriptions.status_id",
                    "render": function ( data, type, full, meta ) {
                        return full.statuses.description;
                    }
                },{
                    "data": "subscriptions.status_date"
                }
            ]
        };

        return table_options;
    },
    /**
     * [getNieuwsbrievenTableOptions]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getNieuwsbrievenTableOptions: function(options, editor) {
        var self = this;
        var table_options = {
            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/nieuwsbrieven/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": (options && options.view === "company" ? [0,1] : [0]) },
                { "sortable": false, "targets": (options && options.view === "company" ? [2,3,4,5,6,7,8,9,10,11] : [1,2,3,4,5,6,7,8,9,10,11]) }
            ],
            columns: [
                {
                    "data": "subscriptions.id"
                },{
                    "data": "subscriptions.company_id",
                    "render": function ( data, type, full, meta ) {
                        console.log('le full', full);
                        return (options && options.view === "company" ? data : full.companies.bedrijfsnaam);
                    }
                },{
                    "data": "service_categories.id",
                    "render": function ( data, type, full, meta ) {
                        return full.service_categories.name;
                    }
                },{
                    "data": "subscriptions.service_id",
                    "render": function ( data, type, full, meta ) {
                        return full.services.name;
                    }
                },{
                    "data": "subscriptions.description"
                },{
                    "data": "subscriptions.price",
                    "render": function ( data, type, full, meta ) {
                        return '&euro; '+data;
                    }
                },{
                    "data": "subscriptions.total_price",
                    "render": function ( data, type, full, meta ) {
                        return '&euro; '+data;
                    }
                },{
                    "data": "subscriptions.subscription_start"
                },{
                    "data": "subscriptions.subscription_end"
                },{
                    "data": "subscriptions.invoice_id",
                    "render": function ( data, type, full, meta ) {
                        var present_html = '';
                        if(data !== '0' && data !== null)
                        {
                            var invoice_url = "https://eenvoud-media.moneybird.nl/invoices/"+data;
                            present_html = '<a href="'+invoice_url+'" class="">'+data+'</a>';
                        }

                        return present_html;
                    }
                },{
                    "data": "subscriptions.invoice_periods_id",
                    "render": function ( data, type, full, meta ) {
                        return full.invoice_periods.description;
                    }
                },{
                    "data": "subscriptions.status_id",
                    "render": function ( data, type, full, meta ) {
                        return full.statuses.description;
                    }
                },{
                    "data": "subscriptions.status_date"
                },{
                    data: null,
                    type: "html",
                    render: function ( data, type, full, meta ) {

                        var company_btn = "";
                        if(!(options && options.view === "company"))
                        {
                            company_btn = ' <a href="" class="btn btn-xs btn-default iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+data.subscriptions.company_id+'">D</a>';
                        }

                        return '<a href="" class="btn btn-xs btn-primary editor_renew">R</a>'+company_btn ;
                    }
                }
            ]
        };

        return table_options;
    },
    /**
     * [getRenewalsTableOptions]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getRenewalsTableOptions: function(options, editor) {

        var self = this;
        var table_options = {
            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/renewals/data",
            order: [[ 0, "desc" ]],
            columnDefs: [
                { "visible": false, "targets": (options && options.view === "company" ? [0,1] : [0]) },
                { "sortable": false, "targets": (options && options.view === "company" ? [2,3,4,5,6,7,8,9,10,11] : [1,2,3,4,5,6,7,8,9,10,11]) }
            ],
            columns: [
                {
                    "data": "subscriptions.id"
                },{
                    "data": "subscriptions.company_id",
                    "render": function ( data, type, full, meta ) {
                        return (options && options.view === "company" ? data : full.companies.bedrijfsnaam);
                    }
                },{
                    "data": "service_categories.id",
                    "render": function ( data, type, full, meta ) {
                        return full.service_categories.name;
                    }
                },{
                    "data": "subscriptions.service_id",
                    "render": function ( data, type, full, meta ) {
                        return full.services.name;
                    }
                },{
                    "data": "subscriptions.description"
                },{
                    "data": "subscriptions.price",
                    "render": function ( data, type, full, meta ) {
                        return '&euro; '+data;
                    }
                },{
                    "data": "subscriptions.total_price",
                    "render": function ( data, type, full, meta ) {
                        return '&euro; '+data;
                    }
                },{
                    "data": "subscriptions.subscription_start"
                },{
                    "data": "subscriptions.subscription_end"
                },{
                    "data": "subscriptions.invoice_id",
                    "render": function ( data, type, full, meta ) {
                        var present_html = '';
                        if(data !== '0' && data !== null)
                        {
                            var invoice_url = "https://eenvoud-media.moneybird.nl/invoices/"+data;
                            present_html = '<a href="'+invoice_url+'" class="">'+data+'</a>';
                        }

                        return present_html;
                    }
                },{
                    "data": "subscriptions.invoice_periods_id",
                    "render": function ( data, type, full, meta ) {
                        return full.invoice_periods.description;
                    }
                },{
                    "data": "subscriptions.status_id",
                    "render": function ( data, type, full, meta ) {
                        return full.statuses.description;
                    }
                },{
                    "data": "subscriptions.status_date"
                },{
                    data: null,
                    type: "html",
                    render: function ( data, type, full, meta ) {

                        var company_btn = "";
                        if(!(options && options.view === "company"))
                        {
                            company_btn = ' <a href="" class="btn btn-xs btn-default iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+data.subscriptions.company_id+'">D</a>';
                        }

                        return '<a href="" class="btn btn-xs btn-primary editor_renew">R</a>'+company_btn ;
                    }
                }
            ]
        };

        return table_options;

    }
};

module.exports = new DtSubscriptionsOptions();
