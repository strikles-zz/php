'use strict';

var worklog_options = require('./options/_worklogs_options');

/**
 * [DtWorklogs - constructor]
 * @param {[type]} options [description]
 */
var DtWorklogs = function(options) {

    this.worklogs_editor         = {};
    this.worklogs_table          = {};
    this.worklogs_table_selector ="#werklogs_table";
};

DtWorklogs.prototype = {

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
        self.initTableListeners(options);
        self.initEditorInlineListeners(options);

    },
    /**
     * [getEditorOptions - get editor configuration options]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorOptions: function(options) {

        var self = this;
        var editor_fields = worklog_options.getEditorFields(options);
        var editor_options = {
            ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"werklogs/data",
            table: "#werklogs_table",
            formOptions: {
                inline: {
                    submitOnBlur: false
                }
            },
            idSrc: "worklogs.id",
            fields: editor_fields
        };

        return editor_options;

    },
    /**
     * [initEditors - create editors]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditors: function(options) {

        var self             = this;
        var editor_options   = self.getEditorOptions(options);
        self.worklogs_editor = global.App.views.Dt.createEditor(self.worklogs_editor, editor_options);

    },
    /**
     * [initEditorListeners - setup editor event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditorListeners: function(options) {

        var self = this;
        self.worklogs_editor.on('preSubmit', function (e, o, a) {

            //console.log(o);
            if(a === "edit" || a === "create") {

                if(options && options.view === 'company')
                {
                    o.data.worklogs.company_id = options.company_id;
                }
                var valid_project_id = global.App.helpers.projects.belongsToCompany(o.data.worklogs.project_id, o.data.worklogs.company_id);
                var company_projects = global.App.helpers.projects.getByCompanyID(o.data.worklogs.company_id);

                // set invalid project type to the 1st valid project for the company
                if(!valid_project_id && company_projects.length) {

                    o.data.worklogs.project_id = undefined;
                }
            }

        }).on( 'submitSuccess', function ( e, json, data ) {

            self.worklogs_table.api().ajax.reload(null, false);
            global.App.helpers.worklogs.init();

        }).on('open', function( e, type ) {

            var worklog_id = e.target.s.fields['worklogs.id'].s.opts._val;
            var company_projects;

            var $company_select = $('#DTE_Field_worklogs\\.company_id');
            var $project_select = $('#DTE_Field_worklogs\\.project_id');
            //worklogs_editor.field( 'worklogs.project_id' ).update( json_projects_init );

            if(e.delegateTarget.s.action === 'create')
            {
                // init - pick first
                var company_1st_val = (options && options.view === 'company' ? options.company_id : $company_select.find('option:first').val());
                //console.log('Create company 1st val', company_1st_val);
                $company_select.val(company_1st_val);

                // check for a default user
                var default_user_id = 3;
                var $user_el        = $('.userdump');
                if($user_el.length)
                {
                    default_user_id = parseInt($user_el.text(), 10);
                    //console.log(">> Got a user "+default_user_id);
                }
                $('#DTE_Field_worklogs\\.user_id').val(default_user_id);

                // corresponding projects
                company_projects = global.App.helpers.projects.getByCompanyID(company_1st_val);
                // update select
                self.worklogs_editor.field( 'worklogs.project_id' ).update(company_projects);
                var project_1st_val = $project_select.find("option:first").val();
                $project_select.val(parseInt(project_1st_val, 10));
                $project_select.find("option:first").prop("selected", "selected");

                // dates
                var fullDate = new Date();
                var currentDate = global.App.views.Dt.getDate(fullDate);
                $('#DTE_Field_worklogs\\.date').val(currentDate);
            }

            else if(e.delegateTarget.s.action === 'edit')
            {
                if(type === "main")
                {
                    var curr_project_id = global.App.helpers.worklogs.getProjectByID(worklog_id);
                    var curr_company_id = (options && options.view === 'company' ? options.company_id : $company_select.find('option:selected').val());

                    company_projects = global.App.helpers.projects.getByCompanyID(curr_company_id);
                    self.worklogs_editor.field( 'worklogs.project_id' ).update(company_projects);

                    if(curr_project_id === null || curr_project_id === undefined) {
                        console.log("Current Project ID is null");
                        $project_select.find("option:first").prop("selected", "selected");
                    } else {
                        $project_select.val(parseInt(curr_project_id, 10));
                    }
                }
            }
        });

        $('body').on('change', '#DTE_Field_worklogs\\.company_id', function() {

            // update projects select for given company
            var curr_company_id = $(this).val();
            var company_projects = global.App.helpers.projects.getByCompanyID(curr_company_id);
            console.log('cid', curr_company_id);
            self.worklogs_editor.field( 'worklogs.project_id' ).update(company_projects);

            // set val to 1st
            var $project_select = $('#DTE_Field_worklogs\\.project_id');
            //$project_select.find("option:first").attr('selected','selected');
            $project_select.find("option:first").prop("selected", "selected");
        });

        $(".hasDatepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    },
    /**
     * [initEditorInlineListeners - setup editor in-table listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditorInlineListeners: function(options) {

        var self = this;

        var $werklogs_table = $('#werklogs_table');
        if(options && options.view === 'company')
        {
            $werklogs_table = options.table;
        }

        //Activate an inline edit on click of a table cell
        $werklogs_table.on('click', 'tbody td:not(:nth-child(2)):not(:nth-child(3)):not(:last-child)', function (e) {
            self.worklogs_editor.inline(this, {
                buttons: { label: '&gt;', fn: function () { this.submit(); } }
            });
        });

        // Edit record
        $werklogs_table.on('click', 'a.editor_edit', function (e) {
            e.preventDefault();

            self.worklogs_editor
                .title( 'Edit record' )
                .buttons( { "label": "Update", "fn": function () { self.worklogs_editor.submit(); } } )
                .edit( $(this).closest('tr') );
        });

        // Delete a record
        $werklogs_table.on('click', 'a.editor_remove', function (e) {
            e.preventDefault();

            self.worklogs_editor
                .title( 'Edit record' )
                .message( "Are you sure you wish to delete this row?" )
                .buttons( { "label": "Delete", "fn": function () { self.worklogs_editor.submit(); } } )
                .remove( $(this).closest('tr') );
        });

        // Delete a record
        $werklogs_table.on('click', 'a.editor_2x', function (e) {
            e.preventDefault();

            var node = $(this).closest('tr');
            if ( node.length !== 1 ) {
                console.log(node);
                return;
            }

            // Place the selected row into edit mode (but hidden),
            // then get the values for all fields in the form
            var values = self.worklogs_editor.edit( node[0], false ).val();
            delete(values['worklogs.id']);

            // Create a new entry (discarding the previous edit) and
            // set the values from the read values
            self.worklogs_editor
                .create( {
                    title: 'Duplicate '+values['worklogs.id'],
                    buttons: 'Create from existing'
                })
                .set( values );
        });

        // New record
        $('a.editor_create').on( 'click', function (e) {
            e.preventDefault();

            self.worklogs_editor
                .title( 'Create new record' )
                .buttons( { "label": "Add", "fn": function () { self.worklogs_editor.submit(); } } )
                .create();
        });
    },
    /**
     * [initTables - create tables]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTables: function(options) {

        var self = this;
        var worklogs_table_options = worklog_options.getTableOptions(options, self.worklogs_editor);
        self.worklogs_table = global.App.views.Dt.createTable(self.worklogs_table, (options && options.view === "company" ? options.table : self.worklogs_table_selector), worklogs_table_options);
    },
    /**
     * [initTableListeners - setup table event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTableListeners: function(options) {

        var self = this;

        self.worklogs_table.on('init.dt', function(e, settings, json) {

            //console.log('json', json);
            // Populate the site select list with the data available in the database on load
            if(!options)
            {
                self.worklogs_editor.field( 'worklogs.company_id' ).update( json.companies );
            }
            self.worklogs_editor.field( 'worklogs.project_id' ).update( json.projects );
            self.worklogs_editor.field( 'worklogs.user_id' ).update( json.users );

            //json_projects_init = json.projects;
            //console.log('init_json', json.strippenkaarten);
        });
    },
    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#werklogs_table').length)
        {
            return false;
        }

        self.init();

        $('body').on('click', '.fetch-roadmap', function (e) {

            $.ajax({
                url: '/admin/werklogs/roadmap/fetch',
                type: 'POST',
                dataType: 'json',
                data: {},
            })
            .done(function() {
                console.log("success");
                self.worklogs_table.api().ajax.reload(null, false);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        });
    },
    /**
     * [ajax_pageloaded_cb callback]
     * @param  {[type]} e [description]
     * @return {[type]}   [description]
     */
    ajax_pageloaded_cb: function(e) {

        var self = this;

        var page       = e.page;
        var company_id = page.modelID;
        var $body      = page.$el;
        var $table     = page.$el.find('#werklogs_table');

        if(!$table.length)
        {
            return false;
        }

        var options = { view: "company", page: e.page, company_id: page.modelID, table: $table };
        self.init(options);
    }
};

module.exports = new DtWorklogs();
