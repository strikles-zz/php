'use strict';

var settings_options = require('./options/_settings_options');

/**
 * [DtSettings - constructor]
 * @param {[type]} options [description]
 */
var DtSettings = function(options) {

    this.settings_editor         = {};
    this.settings_table          = {};
    this.settings_table_selector = "#services_table";
};

DtSettings.prototype = {

    /**
     * [keypress_handler - kb callback for editor shortcuts]
     * @param  {[type]} event [description]
     * @return {[type]}       [description]
     */
    keypress_handler: function(event) {

        var self = event.data.context;

        var code = event.keyCode || event.which;
        console.log('kb code', code);

        var search_focused = ($('.dataTables_filter input:focus').length > 0);
        if(search_focused)
        {
            return;
        }

        var tt = window.TableTools.fnGetInstance('services_table');
        if(!tt) {
            return;
        }

        var node     = tt.fnGetSelected();
        var selected = tt.fnGetSelectedIndexes();
        var values   = self.settings_editor.edit(node[0], false).val();

        console.log('values', values);

        // edit
        if(code === 101 && selected.length === 1)
        {
            self.settings_editor
                .title( 'Edit record' )
                .buttons( { "label": "Update", "fn": function () { self.settings_editor.submit(); } } )
                .edit(selected[0]);
        }

        // remove
        else if(code === 100)
        {
            self.settings_editor
                .title( 'Delete record' )
                .message( "Are you sure you wish to delete this row" + (selected.length > 1 ? "s" : "") + "?" )
                .buttons( { "label": "Delete", "fn": function () { self.settings_editor.submit(); } } )
                .remove(selected);
        }

        // duplicate
        else if(code === 50 && selected.length === 1)
        {
            delete(values['projects.id']);

            // Create a new entry (discarding the previous edit) and
            // set the values from the read values
            self.settings_editor
                .create({
                    title: 'Duplicate Subscription',
                    buttons: 'Create from existing'
                })
                .set(values);
        }
    },
    /**
     * [init - object initialization]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;
        self.initEditors();
        self.initTables();
        self.initEditorListeners();
        self.initInlineEditorListeners();
        self.initTableListeners();

    },
    /**
     * [getEditorOptions - editor init configuration options]
     * @return {[type]} [description]
     */
    getEditorOptions: function() {

        var self = this;
        var editor_fields = settings_options.getEditorFields();

        var settings_editor_options = {
            ajax: "/admin/settings/services/data",
            table: "#services_table",
            formOptions: {
                inline: {
                    submitOnBlur: true
                }
            },
            idSrc: "services.id",
            fields: editor_fields
        };

        return settings_editor_options;
    },
    /**
     * [initEditors - create editor]
     * @return {[type]} [description]
     */
    initEditors: function() {

        var self = this;

        var editor_options = self.getEditorOptions();
        self.settings_editor = global.App.views.Dt.createEditor(self.settings_editor, editor_options);
    },
    /**
     * [initEditorListeners - setup editor event listeners]
     * @return {[type]} [description]
     */
    initEditorListeners: function() {

        var self = this;
        self.settings_editor.on('open', function(e, type) {

            $( "body").unbind("keypress",  self.keypress_handler);

            if(e.delegateTarget.s.action === 'create')
            {
                var $cat_select = $('#DTE_Field_services\\.category_id');
                var cat_1st_val = $cat_select.find('option:first').val();
                $cat_select.val(cat_1st_val);

                var $status_select = $('#DTE_Field_services\\.status_id');
                var status_1st_val = $status_select.find('option:nth-child(2)').val();
                $status_select.val(status_1st_val);

                var $period_select = $('#DTE_Field_services\\.invoice_periods_id');
                var period_1st_val = $period_select.find('option:first').val();
                $period_select.val(period_1st_val);

                console.log('ddd',cat_1st_val, status_1st_val, period_1st_val);
            }
        }).on('preClose', function( e, json, data) {

                $('body').bind("keypress", {context: self}, self.keypress_handler);

        }).on('submitSuccess', function(e, type) {

            self.settings_table.api().ajax.reload(null, false);
            global.App.helpers.services.init();
        });

        $('body').bind("keypress", {context: self}, self.keypress_handler);
    },
    /**
     * [initInlineEditorListeners - setup editor in-table event listeners]
     * @return {[type]} [description]
     */
    initInlineEditorListeners: function() {

        var self = this;

        $('#services_table tbody').on( 'click', 'tr', function () {
            //$(this).parent('tbody').find('tr').removeClass('selected');
            $(this).toggleClass('selected');
        });

        $( ".hasDatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

    },
    /**
     * [initTables - create tables]
     * @return {[type]} [description]
     */
    initTables: function() {

        var self = this;
        var settings_table_options = settings_options.getTableOptions(self.settings_editor);
        self.settings_table = global.App.views.Dt.createTable(self.settings_table, self.settings_table_selector, settings_table_options);

    },
    /**
     * [initTableListeners - setup table event listeners]
     * @return {[type]} [description]
     */
    initTableListeners: function() {

        var self = this;
        self.settings_table.on('init.dt', function(e, settings, json) {
            // Populate the site select list with the data available in the database on load
            self.settings_editor.field( 'services.category_id' ).update(json.service_categories);
            self.settings_editor.field( 'services.status_id' ).update(json.statuses);
            self.settings_editor.field( 'services.invoice_periods_id' ).update(json.invoice_periods);
        });
    },
    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#services_table').length)
        {
            return false;
        }

        self.init();
    }
};

module.exports = new DtSettings();
