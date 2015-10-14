'use strict';

var strippenkaarten_options = require('./options/_strippenkaarten_options');

/**
 * [DtStrippenkaarten constructor]
 */
var DtStrippenkaarten = function() {

    this.strippenkaart_editor = {};
    this.strippenkaart_table  = {};
    this.strippenkaart_table_selector = '#strippenkaarten_table';

};

DtStrippenkaarten.prototype = {

    /**
     * [keypress_handler - kb callback for editor shortcuts]
     * @param  {[type]} event [description]
     * @return {[type]}       [description]
     */
    keypress_handler: function(event) {

        var self = event.data.context;
        var $parent_el = event.data.options.page.$el;
        if(event.data.options && event.data.options.view === "company" && !$parent_el.find("ul#company_tabs li.company_strippenkaart.active").length) {
            console.log("strip kb skip");
            return;
        }

        var search_focused = ($parent_el.find('.dataTables_filter input:focus').length > 0);
        if(search_focused)
        {
            return;
        }

        var code = event.keyCode || event.which;
        console.log('kb code', code);
        var tt = window.TableTools.fnGetInstance('company_strippenkaarten_table');
        if(!tt) {
            return;
        }

        var node     = tt.fnGetSelected();
        var selected = tt.fnGetSelectedIndexes();
        var values   = self.strippenkaart_editor.edit(node[0], false).val();

        console.log('values', values);

        // edit
        if(code === 101 && selected.length === 1)
        {
            self.strippenkaart_editor
                .title( 'Edit record' )
                .buttons( { "label": "Update", "fn": function () { self.strippenkaart_editor.submit(); } } )
                .edit(selected[0]);
        }

        // remove
        else if(code === 100)
        {
            self.strippenkaart_editor
                .title( 'Delete record' )
                .message( "Are you sure you wish to delete this row" + (selected.length > 1 ? "s" : "") + "?" )
                .buttons({ "label": "Delete", "fn": function () { self.strippenkaart_editor.submit(); } })
                .remove(selected);
        }

        // duplicate
        else if(code === 50 && selected.length === 1)
        {
            delete(values['strippenkaarten.id']);
            var strip_hours = parseInt(values['strippenkaarten.hours'], 10);

            var sc_services = global.App.helpers.services.getByCategoryID("5");
            $.each(sc_services, function(ndx, val) {

                var num_hours = parseInt(val.label.split(" ")[0], 10);
                if(strip_hours < num_hours)
                {
                    return false;
                }

                console.log('curr_strip sevice val ', val.value);
                values['strippenkaarten.type'] = val.value;
            });

            // Create a new entry (discarding the previous edit) and
            // set the values from the read values
            self.strippenkaart_editor
                .create({
                    title: 'Duplicate Subscription',
                    buttons: 'Create from existing'
                })
                .set(values);
        }
    },
    /**
     * [init - object initializations]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    init: function(options) {

        var self = this;

        self.initEditors(options);
        self.initTables(options);
        self.initEditorListeners(options);
        self.initInlineEditorListeners(options);
        self.initTableListeners(options);
    },
    /**
     * [getEditorOptions - get editor init options]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorOptions: function(options) {

        var self = this;

        var editor_fields = strippenkaarten_options.getEditorFields(options);
        var editor_options = {
            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"strippenkaarten/data",
            table: "#"+(options && options.view === 'company' ? "company_" : "")+"strippenkaarten_table",
            idSrc: "strippenkaarten.id",
            fields: editor_fields
        };

        return editor_options;
    },
    /**
     * [initEditors - create editor]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditors: function(options) {

        var self = this;
        var editor_options = self.getEditorOptions(options);
        self.strippenkaart_editor = global.App.views.Dt.createEditor(self.strippenkart_editor, editor_options);
    },
    /**
     * [initEditorListeners - init editor event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditorListeners: function(options) {

        var self = this;

        self.strippenkaart_editor.on( 'submitSuccess', function ( e, json, data ) {

            self.strippenkaart_table.api().ajax.reload(null, false);
            global.App.helpers.strippenkaarten.init();

        }).on( 'preSubmit', function ( e, data, action ) {

            console.log('presubmit', data);
            if(action === "edit" || action === "create"){

                data.data.strippenkaarten.company_id = options.company_id;
                var strip_type_text                  = $('#DTE_Field_strippenkaarten\\.type option:selected').text();
                console.log('selected_type', strip_type_text);
                data.data.strippenkaarten.hours      = strip_type_text.substring(0, strip_type_text.indexOf(" "));
            }
        }).on('open', function( e, type ) {

            $( "body").unbind("keypress",  self.keypress_handler);

            var $parent_el = $('body');
            var $strip_select_options = $parent_el.find('#DTE_Field_strippenkaarten\\.type option');
            if(e.delegateTarget.s.action === 'create')
            {
                var strippenkaarten_1st_val = $strip_select_options.first().val();
                console.log("strip create", strippenkaarten_1st_val);

                var default_price           = global.App.helpers.services.getDefaultPrice(strippenkaarten_1st_val);
                $parent_el.find('#DTE_Field_strippenkaarten\\.price').val(default_price);
                $parent_el.find('#DTE_Field_strippenkaarten\\.type').val(strippenkaarten_1st_val);
            }

            else if(e.delegateTarget.s.action === 'edit')
            {
                console.log("strip edit");
                var strip_hours           = self.strippenkaart_editor.field('strippenkaarten.hours').val();

                $strip_select_options.each(function(index, el) {

                    console.log('option txt', $(this).text(), strip_hours === $(this).text().split(" ")[0], typeof strip_hours, typeof $(this).text());
                    if(strip_hours === $(this).text().split(" ")[0])
                    {
                        $parent_el.find('#DTE_Field_strippenkaarten\\.type').val($(this).val());
                        return false;
                    }
                });
            }
        }).on('preClose', function( e, json, data) {

            var nop = 0;
            $('body').bind("keypress", {context: self, options: options}, self.keypress_handler);

        });

        // listen for service changes
        $('body').on('change', '#DTE_Field_strippenkaarten\\.type', function() {

            var curr_service_id = $(this).val();
            var default_price = global.App.helpers.services.getDefaultPrice(curr_service_id);
            $('#DTE_Field_strippenkaarten\\.price').val(default_price);

        });

        $( ".hasDatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $('body').bind("keypress", {context: self, options: options}, self.keypress_handler);
    },
    /**
     * [initInlineEditorListeners - init editor in-table listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initInlineEditorListeners: function(options) {

        var $parent_el = $('#company_strippenkaarten_table');
        if(options && options.view === 'company')
        {
            $parent_el = options.table;
        }

        // Multiple row selection
        $parent_el.on('click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });
    },
    /**
     * [initTables - create tables]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTables: function(options) {

        var self = this;
        var table_options = strippenkaarten_options.getTableOptions(options, self.strippenkaart_editor);

        self.strippenkaart_table = global.App.views.Dt.createTable(
            self.strippenkaart_table,
            (options && options.view === "company" ? options.table : self.strippenkaart_table_selector),
            table_options);
    },
    /**
     * [initTableListeners - initialize table event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTableListeners: function(options) {

        var self = this;
        if(options)
        {
            self.strippenkaart_table.on('init.dt', function(e, settings, json) {
                // Populate the site select list with the data available in the database on load
                var relevant_services = global.App.helpers.services.getByCategoryID("5");
                self.strippenkaart_editor.field( 'strippenkaarten.type' ).update(relevant_services);
            });
        }
    },
    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#strippenkaarten_table').length)
        {
            return false;
        }

        self.init();
        window.oTable = self.strippenkaart_table;
    },
    /**
     * [ajax_pageloaded_cb - callback]
     * @param  {[type]} e [description]
     * @return {[type]}   [description]
     */
    ajax_pageloaded_cb: function(e) {

        var self = this;

        var page       = e.page;
        var company_id = page.modelID;
        var $body      = page.$el;
        var $table     = page.$el.find('#company_strippenkaarten_table');

        //console.log("Strip ajax");
        if(!$table.length)
        {
            console.log("Table not found");
            return false;
        }

        var options = { view: "company", page: e.page, company_id: page.modelID, table: $table };
        //console.log('options', options);
        self.init(options);

        window.oTable = self.strippenkaart_table;
    }
};

module.exports = new DtStrippenkaarten();
