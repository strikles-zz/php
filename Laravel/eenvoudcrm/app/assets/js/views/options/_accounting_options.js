'use strict';

/**
 * [DtAccountingOptions description]
 */
var DtAccountingOptions = function() {
};


DtAccountingOptions.prototype = {

    /**
     * [getEditorFields - dt editor fields]
     * @param  {[type]} data_type [description]
     * @return {[type]}           [description]
     */
    getEditorFields: function(data_type) {

        var self = this;
        var fields;
        if(data_type === 'worklogs')
        {
            fields = [
                {
                    label: "ID",
                    name: 'worklogs.id',
                    type: "hidden"
                },{
                    label: "Project",
                    name: 'worklogs.project_id',
                    type: "hidden"
                },{
                    label: "Company",
                    name: 'worklogs.company_id',
                    type: "hidden"
                }
            ];
        }
        else if(data_type === 'subscriptions')
        {
            fields = [
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
        }

        return fields;
    },

    /**
     * [getUnprocessedWorklogsTableColumns description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getUnprocessedWorklogsTableColumns: function(options) {

        console.log('this', this);

        var columns = [
            {
                data: "worklogs.id"
            },{
                data: "worklogs.date"
            },{
                data: "worklogs.company_id",
                render: function ( data, type, full, meta ) {
                    return full.companies.bedrijfsnaam;
                }
            },{
                data: "worklogs.project_id",
                defaultContent: "undefined",
                render: function ( data, type, full, meta ) {
                    return full.projects.name;
                }
            },{
                data: "worklogs.user_id",
                render: function ( data, type, full, meta ) {
                    return full.users.username;
                }
            },{
                data: "worklogs.minutes"
            },{
                data: "worklogs.description"
            },{
                data: "worklogs.comment"
            },{
                data: null,
                type: "html",
                render: function ( data, type, full, meta ) {
                    console.log('options', options);
                    var company_btn = '';
                    if(!(options && options.view === "company")) {
                        company_btn = ' <a href="" class="btn btn-xs btn-default iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+data.worklogs.company_id+'">D</a>';
                    }
                    return '<a href="" class="btn btn-xs btn-primary editor_invoice">I</a> <a href="" class="btn btn-xs btn-primary editor_strippenkaart">S</a>'+company_btn;
                }
            }
        ];

        return columns;
    },
    /**
     * [getProcessedWorklogsTableColumns description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getProcessedWorklogsTableColumns: function(options) {

        var columns = [
            {
                data: "worklogs.id"
            },{
                data: "worklogs.date"
            },{
                data: "worklogs.company_id",
                render: function ( data, type, full, meta ) {
                    return full.companies.bedrijfsnaam;
                }
            },{
                data: "worklogs.project_id",
                defaultContent: "undefined",
                render: function ( data, type, full, meta ) {
                    return full.projects.name;
                }
            },{
                data: "worklogs.user_id",
                render: function ( data, type, full, meta ) {
                    return full.users.username;
                }
            },{
                data: "worklogs.minutes"
            },{
                data: "worklogs.description"
            },{
                data: "worklogs.comment"
            },{
                data: "worklogs.strippenkaarten_id"
            },{
                data: "worklogs.invoice_id",
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
                data: null,
                type: "html",
                render: function ( data, type, full, meta ) {
                    var company_btn = '';
                    if(!(options && options.view === "company")) {
                        company_btn = ' <a href="" class="btn btn-xs btn-default iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+data.worklogs.company_id+'">D</a>';
                    }
                    return '<a href="" class="btn btn-xs btn-danger editor_invoice">I</a> <a href="" class="btn btn-xs btn-danger editor_strippenkaart">S</a>'+company_btn;
                }
            }
        ];

        return columns;
    },
    /**
     * [getUnprocessedSubscriptionsTableColumns description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getUnprocessedSubscriptionsTableColumns: function(options) {

        var columns = [
            {
                data: "subscriptions.id"
            },{
                data: "subscriptions.company_id",
                render: function ( data, type, full, meta ) {
                    return full.companies.bedrijfsnaam;
                }
            },{
                data: "service_categories.id",
                render: function ( data, type, full, meta ) {
                    return full.service_categories.name;
                }
            },{
                data: "subscriptions.service_id",
                render: function ( data, type, full, meta ) {
                    return full.services.name;
                }
            },{
                data: "subscriptions.description"
            },{
                data: "subscriptions.price",
                render: function ( data, type, full, meta ) {
                    return '&euro; '+data;
                }
            },{
                data: "subscriptions.total_price",
                render: function ( data, type, full, meta ) {
                    return '&euro; '+data;
                }
            },{
                data: "subscriptions.subscription_start"
            },{
                data: "subscriptions.subscription_end"
            },{
                data: "subscriptions.invoice_id",
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
                data: "subscriptions.status_id",
                render: function ( data, type, full, meta ) {
                    return full.statuses.description;
                }
            },{
                data: "subscriptions.status_date"
            },{
                data: null,
                type: "html",
                render: function ( data, type, full, meta ) {
                    var company_btn = '';
                    if(!(options && options.view === "company")) {
                        company_btn = ' <a href="" class="btn btn-xs btn-default iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+data.subscriptions.company_id+'">D</a>';
                    }
                    return '<a href="" class="btn btn-xs btn-primary editor_invoice">I</a>'+company_btn;
                }
            }
        ];

        return columns;
    },
    /**
     * [getProcessedSubscriptionsTableColumns description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getProcessedSubscriptionsTableColumns: function(options) {

        var columns = [
            {
                data: "subscriptions.id"
            },{
                data: "subscriptions.company_id",
                render: function ( data, type, full, meta ) {
                    return full.companies.bedrijfsnaam;
                }
            },{
                data: "service_categories.id",
                render: function ( data, type, full, meta ) {
                    return full.service_categories.name;
                }
            },{
                data: "subscriptions.service_id",
                render: function ( data, type, full, meta ) {
                    return full.services.name;
                }
            },{
                data: "subscriptions.description"
            },{
                data: "subscriptions.price",
                render: function ( data, type, full, meta ) {
                    return '&euro; '+data;
                }
            },{
                data: "subscriptions.total_price",
                render: function ( data, type, full, meta ) {
                    return '&euro; '+data;
                }
            },{
                data: "subscriptions.subscription_start"
            },{
                data: "subscriptions.subscription_end"
            },{
                data: "subscriptions.invoice_id",
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
                data: "subscriptions.status_id",
                render: function ( data, type, full, meta ) {
                    return full.statuses.description;
                }
            },{
                data: "subscriptions.status_date"
            },{
                data: null,
                type: "html",
                render: function ( data, type, full, meta ) {
                    var company_btn = '';
                    if(!(options && options.view === "company")) {
                        company_btn = ' <a href="" class="btn btn-xs btn-default iframe" data-auth="true" data-type="companies" data-action="show" data-id="'+data.subscriptions.company_id+'">D</a>';
                    }
                    return '<a href="" class="btn btn-xs btn-danger editor_invoice">I</a>'+company_btn;
                }
            }
        ];

        return columns;
    },
    /**
     * [getTableColumnDefs - get coreponding dt table init columndefs for a given data_type]
     * @param  {[type]} data_type [description]
     * @param  {[type]} options   [description]
     * @return {[type]}           [description]
     */
    getTableColumnDefs: function(data_type, options) {

        var self = this;
        var column_defs;

        if(data_type === 'worklogs')
        {
            column_defs = [
                {"visible": false, "targets": (options && options.view === 'company' ? [0,1] : [0]) },
                {"sortable":false, "targets": (options && options.view === 'company' ? [2,3,4,5,6,7,8] : [1,2,3,4,5,6,7,8]) }
            ];
        }
        else if(data_type === 'subscriptions')
        {
            column_defs = [
                { "visible": false, "targets": (options && options.view === 'company' ? [0,1] : [0]) },
                { "sortable": false, "targets": (options && options.view === 'company' ? [2,3,4,5,6,7,8,9,10,11,12] : [1,2,3,4,5,6,7,8,9,10,11,12]) }
            ];
        }

        return column_defs;
    }
};

module.exports = new DtAccountingOptions();
