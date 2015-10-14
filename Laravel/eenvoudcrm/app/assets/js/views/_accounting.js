'use strict';

var accounting_options = require('./options/_accounting_options');

/**
 * [Accounting - constructor]
 */
var Accounting = function() {

    this.accounting_worklogs_table                 = {};
    this.accounting_processed_worklogs_table       = {};
    this.accounting_subscriptions_table            = {};
    this.accounting_processed_subscriptions_table  = {};
    this.accounting_worklogs_editor                = {};
    this.accounting_processed_worklogs_editor      = {};
    this.accounting_subscriptions_editor           = {};
    this.accounting_processed_subscriptions_editor = {};
};

Accounting.prototype = {

    /**
     * [getEditor - get the corresponding dt editor for given data_type/processed pair]
     * @param  {[type]} data_type [description]
     * @param  {[type]} processed [description]
     * @return {[type]}           [description]
     */
    getEditor: function(data_type, processed) {

        var self = this;
        var editor;

        if(data_type === 'worklogs' && processed === 'processed')
        {
            editor = self.accounting_processed_worklogs_editor;
        }
        else if(data_type === 'worklogs' && processed === 'unprocessed')
        {
            editor = self.accounting_worklogs_editor;
        }
        else if(data_type === 'subscriptions' && processed === 'processed')
        {
            editor = self.accounting_processed_subscriptions_editor;
        }
        else if(data_type === 'subscriptions' && processed === 'unprocessed')
        {
            editor = self.accounting_subscriptions_editor;
        }

        return editor;
    },
    /**
     * [getEditorOptions - dt editor init options]
     * @param  {[type]} data_type [description]
     * @param  {[type]} processed [description]
     * @param  {[type]} options   [description]
     * @return {[type]}           [description]
     */
    getEditorOptions: function(data_type, processed, options) {

        var self = this;

        var de_fields = accounting_options.getEditorFields(data_type);
        var ajax_url = "/admin/accounting/"+data_type+"/data";
        var table_selector = '#accounting_'+(processed === 'processed' ? 'processed_' : '')+data_type+'_table';
        var id_src = data_type+".id";

        var editor_options = {
            ajax: ajax_url,
            table: table_selector,
            idSrc: id_src,
            fields: de_fields
        };

        return editor_options;
    },
    /**
     * [getTableOptions - dt table init options]
     * @param  {[type]} data_type [description]
     * @param  {[type]} processed [description]
     * @param  {[type]} options   [description]
     * @return {[type]}           [description]
     */
    getTableOptions: function(data_type, processed, options) {

        var self = this;

        // Fixme - use le options for company specific stuff
        var table_selector = '#accounting_'+(processed === 'processed' ? 'processed_' : '')+data_type+'_table';
        var ajax_url       = "/admin/"+(options && options.view === "company" ? "companies/"+options.company_id+"/" : "")+"accounting/"+data_type+"/data/"+processed;
        var column_defs    = accounting_options.getTableColumnDefs(data_type, options);
        var columns        = self.getTableColumns(data_type, processed, options);
        var abuttons       = self.getTabletoolsButtons(data_type, processed, options);
        var row_order      = (data_type === 'worklogs' ? [[ 0, "desc" ]] : [[ 7, "asc" ]]);

        console.log(table_selector, ajax_url);
        var $table_el = $(table_selector);

        var table_options = {
            pageLength: 10,
            ajax: ajax_url,
            order: row_order,
            columnDefs: column_defs,
            columns: columns,
            tableTools: {
                sRowSelect: "multi",
                aButtons: abuttons
            }
        };

        return table_options;
    },
    /**
     * [getTabletoolsButtons - get the correponding tabletools button init options for a given pair data_type/processed]
     * @param  {[type]} data_type [description]
     * @param  {[type]} processed [description]
     * @param  {[type]} options   [description]
     * @return {[type]}           [description]
     */
    getTabletoolsButtons: function(data_type, processed, options) {

        var self = this;
        var buttons;

        if(data_type === 'worklogs' && processed === 'processed')
        {
            buttons = self.getProcessedWorklogsTabletoolsButtons(options);
        }
        else if(data_type === 'worklogs' && processed === 'unprocessed')
        {
            buttons = self.getUnprocessedWorklogsTabletoolsButtons(options);
        }
        else if(data_type === 'subscriptions' && processed === 'processed')
        {
            buttons = self.getProcessedSubscriptionsTabletoolsButtons(options);
        }
        else if(data_type === 'subscriptions' && processed === 'unprocessed')
        {
            buttons = self.getUnprocessedSubscriptionsTabletoolsButtons(options);
        }

        return buttons;
    },
    /**
     * [getTableColumns - get coreponding dt table init options for a given pair data_type/processed]
     * @param  {[type]} data_type [description]
     * @param  {[type]} processed [description]
     * @param  {[type]} options   [description]
     * @return {[type]}           [description]
     */
    getTableColumns: function(data_type, processed, options) {

        var self = this;
        var columns;

        if(data_type === 'worklogs' && processed === 'processed')
        {
            columns = accounting_options.getProcessedWorklogsTableColumns(options);
        }
        else if(data_type === 'worklogs' && processed === 'unprocessed')
        {
            columns = accounting_options.getUnprocessedWorklogsTableColumns(options);
        }
        else if(data_type === 'subscriptions' && processed === 'processed')
        {
            columns = accounting_options.getProcessedSubscriptionsTableColumns(options);
        }
        else if(data_type === 'subscriptions' && processed === 'unprocessed')
        {
            columns = accounting_options.getUnprocessedSubscriptionsTableColumns(options);
        }

        return columns;
    },
    /**
     * [getUnprocessedWorklogsTabletoolsButtons]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getUnprocessedWorklogsTabletoolsButtons: function(options) {

        var self = this;

        var buttons = [
            {
                // multi invoice
                sExtends:    "select",
                sButtonText: "Invoice",
                fnClick:     function( button, config ) {

                    console.log('editor this', this);

                    var values = [];
                    var node = this.fnGetSelected();
                    console.log('worklogs invoice nodes', node);

                    $.each(node, function(index, value) {
                        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                        values[index] = self.accounting_worklogs_editor.edit( node[index], false ).val();
                    });
                    console.log('worklogs values', values);

                    // Create a new entry (discarding the previous edit) and set the values from the read values
                    self.accounting_worklogs_editor
                        .title( 'Invoice selected worklogs' )
                        .buttons({
                            "label": "Invoice",
                            "fn": function () {

                                global.App.views.Dt.singularAjaxRequest(
                                    {"values": values, "type": "invoice"},
                                    '/admin/accounting/worklogs/data',
                                    self.accounting_worklogs_editor);

                                self.reloadAllTables();
                            }
                        })
                        .message('Press the "Invoice" button to invoice the selected worklogs.')
                        .open();
                }
            },
            {
                // multi strippenkaart
                sExtends:    "select",
                sButtonText: "Strippenkaart",
                fnClick:     function( button, config ) {

                    var values = [];
                    var node   = this.fnGetSelected();
                    $.each(node, function(index, value) {
                        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                        values[index] = self.accounting_worklogs_editor.edit( node[index], false ).val();
                    });

                    // Create a new entry (discarding the previous edit) and set the values from the read values
                    self.accounting_worklogs_editor
                        .title('Associate selected worklogs')
                        .buttons({
                            "label": "Strippenkaart",
                            "fn": function () {

                                global.App.views.Dt.multipleAjaxRequests(
                                    {"values": values, "type": "strippenkaart"},
                                    '/admin/accounting/worklogs/data',
                                    self.accounting_worklogs_editor);

                                self.reloadAllTables();
                            }
                        })
                        .message('Press the "Strippenkaart" button to try associating selected worklogs with existing strippenkaarten.')
                        .open();
                }
            }
        ];

        return buttons;
    },
    /**
     * [getProcessedWorklogsTabletoolsButtons]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getProcessedWorklogsTabletoolsButtons: function(options) {

        var self = this;

        var buttons = [
            {
                // multi invoice
                sExtends:    "select",
                sButtonText: "Clear Invoices",
                fnClick:     function( button, config ) {

                    var values = [];
                    var node = this.fnGetSelected();

                    console.log('worklogs invoice nodes', node);
                    console.log('editor', self.accounting_processed_worklogs_editor);

                    $.each(node, function(index, value) {
                        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                        values[index] = self.accounting_processed_worklogs_editor.edit( node[index], false ).val();
                    });

                    // Create a new entry (discarding the previous edit) and set the values from the read values
                    self.accounting_processed_worklogs_editor
                        .title( 'Clear selected worklogs invoices' )
                        .buttons({
                            "label": "Clear Invoices",
                            "fn": function () {

                                global.App.views.Dt.multipleAjaxRequests(
                                    {"values": values, "type": "invoice_clear"},
                                    '/admin/accounting/worklogs/data',
                                    self.accounting_processed_worklogs_editor);

                                self.reloadAllTables();
                            }
                        })
                        .message('Press the "Clear Invoices" button to clear invoice details associated with the selected worklogs.')
                        .open();
                }
            },
            {
                // multi strippenkaart
                sExtends:    "select",
                sButtonText: "Clear Strippenkaarten",
                fnClick:     function( button, config ) {

                    var values = [];
                    var node = this.fnGetSelected();

                    $.each(node, function(index, value) {
                        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                        values[index] = self.accounting_processed_worklogs_editor.edit( node[index], false ).val();
                    });

                    // Create a new entry (discarding the previous edit) and set the values from the read values
                    self.accounting_processed_worklogs_editor
                        .title( 'Clear selected worklogs strippenkaart associations' )
                        .buttons({
                            "label": "Clear Strippenkaarten",
                            "fn": function () {

                                global.App.views.Dt.multipleAjaxRequests(
                                    {"values": values, "type": "strippenkaarten_clear"},
                                    '/admin/accounting/worklogs/data',
                                    self.accounting_processed_worklogs_editor);

                                self.reloadAllTables();
                            }
                        })
                        .message('Press the "Clear Strippenkaarten" button to clear association of selected worklogs to strippenkaarten.')
                        .open();
                }
            }
        ];

        return buttons;
    },
    /**
     * [getUnprocessedSubscriptionsTabletoolsButtons]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getUnprocessedSubscriptionsTabletoolsButtons: function(options) {

        var self = this;

        var buttons = [
            {

                // multi invoice
                sExtends:    "select",
                sButtonText: "Invoice",
                fnClick:     function( button, config ) {

                    var values = [];
                    var node = this.fnGetSelected();

                    $.each(node, function(index, value) {

                        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                        values[index] = self.accounting_subscriptions_editor.edit( node[index], false ).val();
                    });

                    // Create a new entry (discarding the previous edit) and set the values from the read values
                    self.accounting_subscriptions_editor
                        .title( 'Invoice selected subscriptions' )
                        .buttons({
                            "label": "Invoice",
                            "fn": function () {

                                global.App.views.Dt.singularAjaxRequest(
                                    {"values": values, "type": "invoice"},
                                    '/admin/accounting/subscriptions/data',
                                    self.accounting_subscriptions_editor);

                                self.reloadAllTables();
                            }
                        })
                        .message('Press the "Invoice" button to invoice the selected subscriptions.')
                        .open();
                }
            }
        ];

        return buttons;
    },
    /**
     * [getProcessedSubscriptionsTabletoolsButtons]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getProcessedSubscriptionsTabletoolsButtons: function(options) {

        var self = this;

        var buttons = [
            {
                // multi invoice
                sExtends:    "select",
                sButtonText: "Clear Invoices",
                fnClick:     function( button, config ) {

                    var values = [];
                    var node = this.fnGetSelected();

                    $.each(node, function(index, value) {

                        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                        values[index] = self.accounting_processed_subscriptions_editor.edit( node[index], false ).val();
                    });

                    // Create a new entry (discarding the previous edit) and set the values from the read values
                    self.accounting_processed_subscriptions_editor
                        .title( 'Clear selected subscriptions invoices' )
                        .buttons({
                            "label": "Clear Invoices",
                            "fn": function () {

                                global.App.views.Dt.multipleAjaxRequests(
                                    {"values": values, "type": "invoice_clear"},
                                    '/admin/accounting/subscriptions/data',
                                    self.accounting_processed_subscriptions_editor);

                                self.reloadAllTables();
                            }
                        })
                        .message('Press the "Clear Invoices" button to clear invoice details associated with the selected subscriptions.')
                        .open();
                }
            }
        ];

        return buttons;
    },
    /**
     * [reloadSubscriptionsTables]
     * @return {[type]} [description]
     */
    reloadSubscriptionsTables: function() {

        var self = this;

        self.accounting_subscriptions_table.api().ajax.reload(null ,false);
        self.accounting_processed_subscriptions_table.api().ajax.reload(null, false);
    },
    /**
     * [reloadWorklogsTables]
     * @return {[type]} [description]
     */
    reloadWorklogsTables: function() {

        var self = this;

        self.accounting_worklogs_table.api().ajax.reload(null, false);
        self.accounting_processed_worklogs_table.api().ajax.reload(null, false);
    },
    /**
     * [reloadTables]
     * @param  {[type]} data_type [description]
     * @return {[type]}           [description]
     */
    reloadTables: function(data_type) {

        var self = this;

        if(data_type === 'worklogs') {
            self.reloadWorklogsTables();
        }
        else if(data_type === 'subscriptions') {
            self.reloadSubscriptionsTables();
        }
        else {
            console.log('Error: Invalid data_type - '+data_type);
        }
    },
    /**
     * [reloadAllTables]
     * @return {[type]} [description]
     */
    reloadAllTables: function() {

        var self = this;

        self.reloadWorklogsTables();
        self.reloadSubscriptionsTables();
    },
    /**
     * [init - initialization]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    init: function(options) {

        console.log('accounting options', options);

        var self = this;

        self.initEditors(options);
        self.initTables(options);
        self.initRowListeners(options);
        self.initEditorListeners(options);
    },
    /**
     * [initTables - create all the tables]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTables: function(options) {

        var self = this;

        var accounting_processed_worklogs_table_options = self.getTableOptions('worklogs', 'processed', options);
        self.accounting_processed_worklogs_table  = global.App.views.Dt.createTable(
            self.accounting_processed_worklogs_table,
            (options && options.view === "company" ? options.table.worklogs.processed : "#accounting_processed_worklogs_table"),
            accounting_processed_worklogs_table_options
        );
        console.log('wp accounting options', accounting_processed_worklogs_table_options);

        var accounting_unprocessed_worklogs_table_options = self.getTableOptions('worklogs', 'unprocessed', options);
        self.accounting_worklogs_table  = global.App.views.Dt.createTable(
            self.accounting_worklogs_table,
            (options && options.view === "company" ? options.table.worklogs.unprocessed : "#accounting_worklogs_table"),
            accounting_unprocessed_worklogs_table_options
        );
        console.log('wu accounting options', accounting_unprocessed_worklogs_table_options);

        var accounting_processed_subscriptions_table_options = self.getTableOptions('subscriptions', 'processed', options);
        self.accounting_processed_subscriptions_table  = global.App.views.Dt.createTable(
            self.accounting_processed_subscriptions_table,
            (options && options.view === "company" ? options.table.subscriptions.processed : "#accounting_processed_subscriptions_table"),
            accounting_processed_subscriptions_table_options
        );
        console.log('sp accounting options', accounting_processed_subscriptions_table_options);

        var accounting_unprocessed_subscriptions_table_options = self.getTableOptions('subscriptions', 'unprocessed', options);
        self.accounting_subscriptions_table  = global.App.views.Dt.createTable(
            self.accounting_subscriptions_table,
            (options && options.view === "company" ? options.table.subscriptions.unprocessed : "#accounting_subscriptions_table"),
            accounting_unprocessed_subscriptions_table_options
        );
        console.log('su accounting options', accounting_unprocessed_subscriptions_table_options);
    },
    /**
     * [initEditors - create all the editors]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditors: function(options) {

        var self = this;

        var accounting_worklogs_editor_options = self.getEditorOptions('worklogs', 'unprocessed', options);
        self.accounting_worklogs_editor  = global.App.views.Dt.createEditor(self.accounting_worklogs_editor, accounting_worklogs_editor_options);

        var accounting_processed_worklogs_editor_options = self.getEditorOptions('worklogs', 'processed', options);
        self.accounting_processed_worklogs_editor  = global.App.views.Dt.createEditor(self.accounting_processed_worklogs_editor, accounting_processed_worklogs_editor_options);

        var accounting_subscriptions_editor_options = self.getEditorOptions('subscriptions', 'unprocessed', options);
        self.accounting_subscriptions_editor  = global.App.views.Dt.createEditor(self.accounting_subscriptions_editor, accounting_subscriptions_editor_options);

        var accounting_processed_subscriptions_editor_options = self.getEditorOptions('subscriptions', 'processed', options);
        self.accounting_processed_subscriptions_editor  = global.App.views.Dt.createEditor(self.accounting_processed_subscriptions_editor, accounting_processed_subscriptions_editor_options);
    },

    initEditorListeners: function(options) {

        var self = this;

        self.accounting_worklogs_editor.on('close', function() {
            self.reloadAllTables();
        });
        self.accounting_processed_worklogs_editor.on('close', function() {
            self.reloadAllTables();
        });
        self.accounting_subscriptions_editor.on('close', function() {
            self.reloadAllTables();
        });
        self.accounting_processed_subscriptions_editor.on('close', function() {
            self.reloadAllTables();
        });
    },
    /**
     * [addRowButtonListener - in-table row button listeners]
     * @param {[type]} options [description]
     */
    addRowButtonListener: function(options) {

        var self = this;

        var $el  = options.$el;
        var node = $el.closest('tr');
        if (node.length !== 1) {
            console.log(node);
            return;
        }

        // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
        var values = [];
        var editor = self.getEditor(options.data_type, options.processed);
        values[0]  = editor.edit( node[0], false ).val();
        console.log('row listener values', values);

        // Create a new entry (discarding the previous edit) and set the values from the read values
        editor
            .title(options.title)
            .buttons({
                "label": options.button_label,
                "fn": function () {
                    global.App.views.Dt.singularAjaxRequest({"values": values, "type": options.op_type}, '/admin/accounting/'+options.data_type+'/data', editor);
                }
            })
            .message(options.dialog_msg)
            .open();
    },
    /**
     * [initRowListeners - initialize all the in-table row buttons]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initRowListeners: function(options) {

        var self = this;

        var $accounting_worklogs_table,
            $accounting_subscriptions_table,
            $accounting_processed_worklogs_table,
            $accounting_processed_subscriptions_table;

        if(options && options.view === 'company') {
            $accounting_worklogs_table = options.page.$el.find('#accounting_worklogs_table');
            $accounting_subscriptions_table = options.page.$el.find('#accounting_subscriptions_table');
            $accounting_processed_worklogs_table = options.page.$el.find('#accounting_processed_worklogs_table');
            $accounting_processed_subscriptions_table = options.page.$el.find('#accounting_processed_subscriptions_table');
        }
        else {
            $accounting_worklogs_table = $('#accounting_worklogs_table');
            $accounting_subscriptions_table = $('#accounting_subscriptions_table');
            $accounting_processed_worklogs_table = $('#accounting_processed_worklogs_table');
            $accounting_processed_subscriptions_table = $('#accounting_processed_subscriptions_table');
        }

        // worklogs row strip
        $accounting_worklogs_table.on( 'click', 'a.editor_strippenkaart', function (e) {

            e.preventDefault();
            self.addRowButtonListener({
                $el: $(this),
                data_type: 'worklogs',
                op_type: 'strippenkaarten',
                processed: 'unprocessed',
                title: 'Associate selected worklog to strippenkaart',
                button_label: 'Strippenkaart',
                dialog_msg: 'Press the "Strippenkaart" button to try associating of selected worklog to existing strippenkaarten.'
            });
        });

        // worklogs row strip
        $accounting_processed_worklogs_table.on( 'click', 'a.editor_strippenkaart', function (e) {

            e.preventDefault();
            self.addRowButtonListener({
                $el: $(this),
                data_type: 'worklogs',
                op_type: 'strippenkaarten_clear',
                processed: 'processed',
                title: 'Clear selected worklog strippenkaart',
                button_label: 'Clear Strippenkaart',
                dialog_msg: 'Press the "Clear Strippenkaart" button to clear association of selected worklog to strippenkaarten.'
            });
        });

        // worklogs row invoice
        $accounting_worklogs_table.on( 'click', 'a.editor_invoice', function (e) {

            e.preventDefault();
            self.addRowButtonListener({
                $el: $(this),
                data_type: 'worklogs',
                op_type: 'invoice',
                processed: 'unprocessed',
                title: 'Invoice selected worklog',
                button_label: 'Invoice',
                dialog_msg: 'Press the "Invoice" button to invoice the selected worklog.'
            });
        });

        // worklogs row invoice
        $accounting_processed_worklogs_table.on( 'click', 'a.editor_invoice', function (e) {

            e.preventDefault();
            self.addRowButtonListener({
                $el: $(this),
                data_type: 'worklogs',
                op_type: 'invoice_clear',
                processed: 'processed',
                title: 'Clear selected worklog invoice',
                button_label: 'Clear Invoice',
                dialog_msg: 'Press the "Clear Invoice" button to clear invoice details associated with the selected worklog.'
            });
        });

        // subscriptions row invoice
        $accounting_subscriptions_table.on( 'click', 'a.editor_invoice', function(e) {

            e.preventDefault();
            self.addRowButtonListener({
                $el: $(this),
                data_type: 'subscriptions',
                op_type: 'invoice',
                processed: 'unprocessed',
                title: 'Invoice selected subscription',
                button_label: 'Invoice',
                dialog_msg: 'Press the "Invoice" button to invoice the selected subscription.'
            });
        });

        $accounting_processed_subscriptions_table.on( 'click', 'a.editor_invoice', function (e) {

            e.preventDefault();
            self.addRowButtonListener({
                $el: $(this),
                data_type: 'subscriptions',
                op_type: 'invoice_clear',
                processed: 'processed',
                title: 'Clear selected subscription invoice',
                button_label: 'Clear Invoice',
                dialog_msg: 'Press the "Clear Invoice" button to clear invoice details associated with the selected subscription.'
            });
        });

        // Multiple row selection
        $accounting_worklogs_table.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });

        $accounting_processed_worklogs_table.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });

        $accounting_subscriptions_table.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });

        $accounting_processed_subscriptions_table.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });
    },
    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#accounting-container').length)
        {
            return false;
        }

        console.log("Running doc ready CB");

        self.init();
        $( ".hasDatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    },
    /**
     * [ajax_pageloaded_cb - callback]
     * @param  {[type]} e [description]
     * @return {[type]}   [description]
     */
    ajax_pageloaded_cb: function(e) {

        var self       = this;
        var page       = e.page;
        var company_id = page.modelID;
        var $body      = page.$el;

        var $accounting_container = page.$el.find('.accounting-container');
        if(!$accounting_container.length)
        {
            return false;
        }

        console.log("Running ajax CB");

        var $unprocessed_subscriptions_table = $accounting_container.find('#accounting_subscriptions_table');
        var $processed_subscriptions_table   = $accounting_container.find('#accounting_processed_subscriptions_table');

        var $unprocessed_worklogs_table      = $accounting_container.find('#accounting_worklogs_table');
        var $processed_worklogs_table        = $accounting_container.find('#accounting_processed_worklogs_table');

        console.log("O_O", $processed_subscriptions_table.length, $unprocessed_subscriptions_table.length, $processed_worklogs_table.length, $unprocessed_worklogs_table.length);

        var options = {
            view: "company",
            page: e.page,
            company_id: page.modelID,
            table: {
                subscriptions: {
                    unprocessed: $unprocessed_subscriptions_table,
                    processed: $processed_subscriptions_table
                },
                worklogs: {
                    unprocessed: $unprocessed_worklogs_table,
                    processed: $processed_worklogs_table
                }
            }
        };

        self.init(options);
    }
};

module.exports = new Accounting();
