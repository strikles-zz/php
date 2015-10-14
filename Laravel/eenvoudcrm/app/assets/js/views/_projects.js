'use strict';

var project_options = require('./options/_projects_options');

/**
 * [DtProjects - constructor]
 */
var DtProjects = function() {

    this.projects_editor         = {};
    this.projects_table          = {};
    this.projects_table_selector = "#projects_table";
};

DtProjects.prototype = {

    /**
     * [keypress_handler - kb callback for editor shortcuts]
     * @param  {[type]} event [description]
     * @return {[type]}       [description]
     */
    keypress_handler: function(event) {

        var self = event.data.context;
        var $parent_el = $('body');
        if(event.data.options && event.data.options.view === "company" && !$parent_el.find("ul#company_tabs li.company_projects.active").length) {
            console.log("project kb skip");
            $parent_el = event.data.options.page.$el;

            return;
        }

        var search_focused = ($parent_el.find('.dataTables_filter input:focus').length > 0);
        if(search_focused)
        {
            return;
        }

        var code = event.keyCode || event.which;
        console.log('kb code', code);

        var tt = window.TableTools.fnGetInstance('projects_table');
        if(!tt) {
            return;
        }

        var node = tt.fnGetSelected();
        var selected = tt.fnGetSelectedIndexes();
        var values = self.projects_editor.edit(node[0], false).val();

        console.log('values', values);

        // edit
        if(code === 101 && selected.length === 1)
        {
            self.projects_editor
                .title( 'Edit record' )
                .buttons( { "label": "Update", "fn": function () { self.projects_editor.submit(); } } )
                .edit(selected[0]);
        }

        // remove
        else if(code === 100)
        {
            self.projects_editor
                .title( 'Delete record' )
                .message( "Are you sure you wish to delete this row" + (selected.length > 1 ? "s" : "") + "?" )
                .buttons( { "label": "Delete", "fn": function () { self.projects_editor.submit(); } } )
                .remove(selected);
        }

        // duplicate
        else if(code === 50 && selected.length === 1)
        {
            delete(values['projects.id']);

            // Create a new entry (discarding the previous edit) and
            // set the values from the read values
            self.projects_editor
                .create({
                    title: 'Duplicate Subscription',
                    buttons: 'Create from existing'
                })
                .set(values);
        }
    },
    /**
     * [init - object initialization]
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
     * [getEditorOptions - setup editor initialization options]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorOptions: function(options) {

        var self = this;
        var editor_fields = project_options.getEditorFields(options);
        var editor_options = {
            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"projects/data",
            //table: "#"+(options && options.view === 'company' ? "company_" : "")+"projects_table",
            table: "#projects_table",
            idSrc: "projects.id",
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
        self.projects_editor = global.App.views.Dt.createEditor(self.projects_editor, editor_options);
    },
    /**
     * [initEditorListeners - initialize editor event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditorListeners: function(options) {

        var self = this;

        self.projects_editor.on('submitSuccess', function ( e, json, data ) {

            self.projects_table.api().ajax.reload(null, false);
            global.App.helpers.projects.init();
        });

        if(options && options.view === "company")
        {
            self.projects_editor.on('preSubmit', function ( e, o, a ) {
                console.log(o);
                if(a === "edit" || a === "create"){
                    o.data.projects.company_id = options.company_id;
                }
            });
        }
        else
        {
            self.projects_editor.on('open', function( e, type ) {

                $( "body").unbind("keypress",  self.keypress_handler);

                if(e.delegateTarget.s.action === 'create') {
                    var $create_companies_select = $('#DTE_Field_projects\\.company_id');
                    var company_1st_val = $create_companies_select.find('option:first').val();
                    $create_companies_select.val(company_1st_val);
                }

            }).on('preClose', function( e, json, data) {

                $('body').bind("keypress", {context: self, options: options}, self.keypress_handler);

            });
        }

        $( ".hasDatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

        $('body').bind("keypress", {context: self, options: options}, self.keypress_handler);

    },
    /**
     * [initInlineEditorListeners - Initialize editor row listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initInlineEditorListeners: function(options) {

        var $parent_el = $('#projects_table');
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
     * [initTables - create table]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTables: function(options) {

        var self = this;
        var projects_table_options = project_options.getTableOptions(options, self.projects_editor);
        //console.log('pto', projects_table_options);
        self.projects_table = global.App.views.Dt.createTable(self.projects_table, (options && options.view === "company" ? options.table : self.projects_table_selector), projects_table_options);

    },
    /**
     * [initTableListeners - initialize table listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTableListeners: function(options) {

        var self = this;

        if(!options)
        {
            self.projects_table.on('init.dt', function(e, settings, json) {
                // Populate the site select list with the data available in the database on load
                self.projects_editor.field( 'projects.company_id' ).update( json.companies );
            });
        }
    },
    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;
        if(!$('#projects_table').length)
        {
            return false;
        }

        self.init();
        window.oTable = self.projects_table;
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
        var $table     = page.$el.find('#projects_table');

        if(!$table.length)
        {
            return false;
        }

        var options = { view: "company", page: e.page, company_id: page.modelID, table: $table };
        self.init(options);

        window.oTable = self.projects_table;
    }
};

module.exports = new DtProjects();
