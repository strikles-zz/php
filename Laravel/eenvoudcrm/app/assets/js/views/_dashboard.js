'use strict';

var dashboard_options = require('./options/_dashboard_options');

/**
 * [DtDashboard - constructor]
 */
var DtDashboard = function() {

    this.dashboard_editor         = {};
    this.dashboard_table          = {};
    this.dashboard_table_selector = "#dashboard_table";
};

DtDashboard.prototype = {

    /**
     * [init - initialization]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;
        self.initEditors();
        self.initTables();
        self.initEditorListeners();
        self.initTableListeners();
        self.initEditorInlineListeners();
        self.initFormListeners();

    },
    /**
     * [getEditorOptions - get all the editor initialization options]
     * @return {[type]} [description]
     */
    getEditorOptions: function() {

        var self = this;

        var editor_fields = dashboard_options.getEditorFields();
        var editor_options = {
            ajax: "/admin/werklogs/data",
            table: "#dashboard_table",
            formOptions: {
                inline: {
                    submitOnBlur: true
                }
            },
            idSrc: "worklogs.id",
            fields: editor_fields
        };

        return editor_options;
    },
    /**
     * [initEditors - create editor]
     * @return {[type]} [description]
     */
    initEditors: function() {

        var self = this;
        var editor_options = self.getEditorOptions();
        self.dashboard_editor = global.App.views.Dt.createEditor(self.dashboard_editor, editor_options);

    },
    /**
     * [initEditorListeners - init editor event listeners]
     * @return {[type]} [description]
     */
    initEditorListeners: function() {

        var self = this;
        self.dashboard_editor.on('preSubmit', function (e, o, a) {

            console.log(o);
            if(a === "edit" || a === "create") {

                console.log('PID', o.data.worklogs.project_id);
                var valid_project_id = global.App.helpers.projects.belongsToCompany(o.data.worklogs.project_id, o.data.worklogs.company_id);
                var company_projects = global.App.helpers.projects.getByCompanyID(o.data.worklogs.company_id);

                // set invalid project type to the 1st valid project for the company
                if(!valid_project_id && company_projects.length) {

                    o.data.worklogs.project_id = undefined;
                }
            }

        }).on( 'submitSuccess', function ( e, json, data ) {

            self.dashboard_table.api().ajax.reload(null, false);
            global.App.helpers.worklogs.init();
            $('#project').focus();

        }).on('open', function( e, type ) {

            console.log('type', type);

            var company_projects;

            var $company_select = $('#DTE_Field_worklogs\\.company_id');
            var $project_select = $('#DTE_Field_worklogs\\.project_id');

            if(e.delegateTarget.s.action === 'create')
            {
                // init - pick first
                var company_1st_val = $company_select.find('option:first').val();
                console.log(company_1st_val);
                $company_select.val(company_1st_val);

                // check for a default user
                var default_user_id = 3;
                var $user_el = $('.userdump');
                if($user_el.length)
                {
                    default_user_id = parseInt($user_el.text(), 10);
                    console.log(">> Got a user "+default_user_id);
                }
                $('#DTE_Field_worklogs\\.user_id').val(default_user_id);

                // corresponding projects
                company_projects = global.App.helpers.projects.getByCompanyID(company_1st_val);
                // update select
                self.dashboard_editor.field( 'worklogs.project_id' ).update(company_projects);
                // set current service id - 1st val
                var project_1st_val = $project_select.find('option:first').val();
                console.log('Open Project 1st val', project_1st_val);
                $project_select.val(project_1st_val);
                $project_select.find("option:first").prop("selected", "selected");

                // dates
                var fullDate = new Date();
                var currentDate = global.App.views.Dt.getDate(fullDate);
                $('#DTE_Field_worklogs\\.date').val(currentDate);
            }

            else if(e.delegateTarget.s.action === 'edit')
            {
                console.log('e', e);
                if(type === "main")
                {
                    var worklog_id = e.target.s.fields['worklogs.id'].s.opts._val;
                    var curr_project_id = global.App.helpers.worklogs.getProjectByID(worklog_id.toString());
                    console.log('curr proj id', curr_project_id);
                    var curr_company_id = $company_select.find('option:selected').val();

                    company_projects = global.App.helpers.projects.getByCompanyID(curr_company_id);
                    self.dashboard_editor.field( 'worklogs.project_id' ).update(company_projects);

                    if(curr_project_id === null) {
                        console.log("Current Project ID is null");
                        //$project_select.find("option:first").attr('selected','selected');
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
            self.dashboard_editor.field( 'worklogs.project_id' ).update(company_projects);

            // set val to 1st
            var $project_select = $('#DTE_Field_worklogs\\.project_id');
            //$project_select.find("option:first").attr('selected','selected');
            $project_select.find("option:first").prop("selected", "selected");
        });

        $( ".hasDatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

    },
    /**
     * [initEditorInlineListeners - init inline-editor listeners]
     * @return {[type]} [description]
     */
    initEditorInlineListeners: function() {

        var self = this;
        var $dashboard_table = $('#dashboard_table');

        //Activate an inline edit on click of a table cell
        $dashboard_table.on('click', 'tbody td:not(:nth-child(2)):not(:nth-child(3)):not(:last-child)', function (e) {

            self.dashboard_editor.inline(this, {
                buttons: { label: '&gt;', fn: function () { this.submit(); } }
            });
        });
        // Edit record
        $dashboard_table.on( 'click', 'a.editor_edit', function (e) {

            e.preventDefault();
            self.dashboard_editor
                .title( 'Edit worklog' )
                .buttons({
                    "label": "Update",
                    "fn": function () {
                        global.App.views.DtDashboard.dashboard_editor.submit();
                    }
                })
                .edit( $(this).closest('tr') );
        });
        // Delete a record
        $dashboard_table.on( 'click', 'a.editor_remove', function (e) {

            e.preventDefault();
            self.dashboard_editor
                .title( 'Remove worklog' )
                .message( "Are you sure you wish to delete this row?" )
                .buttons({
                    "label": "Delete",
                    "fn": function () {
                        global.App.views.DtDashboard.dashboard_editor.submit();
                    }
                })
                .remove( $(this).closest('tr') );
        });
        // Delete a record
        $dashboard_table.on( 'click', 'a.editor_2x', function (e) {

            e.preventDefault();
            var node = $(this).closest('tr');
            if (node.length !== 1) {
                console.log(node);
                return;
            }

            // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
            var values = self.dashboard_editor.edit( node[0], false ).val();
            delete(values['worklogs.id']);

            // Create a new entry (discarding the previous edit) and set the values from the read values
            self.dashboard_editor
                .create({
                    title: 'Duplicate worklog',
                    buttons: 'Create from existing'
                })
                .set(values);
        });

        // New record
        $('a.editor_create').on( 'click', function (e) {
            e.preventDefault();

            self.dashboard_editor
                .title( 'Create new worklog entry' )
                .buttons({
                    "label": "Add",
                    "fn": function () {
                        self.dashboard_editor.submit();
                    }
                })
                .create();
        });

    },
    /**
     * [initTables - create table]
     * @return {[type]} [description]
     */
    initTables: function() {

        var self = this;
        var dashboard_table_options = dashboard_options.getTableOptions(self.dashboard_editor);
        self.dashboard_table = global.App.views.Dt.createTable(self.dashboard_table, self.dashboard_table_selector, dashboard_table_options);

    },
    /**
     * [initTableListeners - initialize table listeners]
     * @return {[type]} [description]
     */
    initTableListeners: function() {

        var self = this;
        self.dashboard_table.on('init.dt', function(e, settings, json) {

            console.log('init event fired', json);
            // Populate the site select list with the data available in the database on load
            self.dashboard_editor.field( 'worklogs.company_id' ).update( json.companies );
            self.dashboard_editor.field( 'worklogs.project_id' ).update( json.projects );
            self.dashboard_editor.field( 'worklogs.user_id' ).update( json.users );
        });
    },
    /**
     * [initFormListeners - initialize top form listeners]
     * @return {[type]} [description]
     */
    initFormListeners: function() {

        // MISC
        $('#project').focus();

        // TYPEAHEAD
        global.App.typeahead.init();
        // When an item is selected from the list, attach this item to the parent item
        $('input.typeahead').on('typeahead:selected', function(event, suggestion, dataset) {

            console.log(event, suggestion, dataset);
            $('input[name=company_id]').val(suggestion.company_id);
            $('input[name=project_id]').val(suggestion.id);

            event.preventDefault();
        });

        // DASBOARD TOP FORM
        $('.dashboard_form').submit(function(e) {

            e.preventDefault();

            var request_data = {
                company_id:     $('input[name=company_id]').val(),
                project_id:     $('input[name=project_id]').val(),
                user_id:        $('input[name=user_id]').val(),
                date:           $('input[name=date]').val(),
                minutes:        $('#minutes').val(),
                description:    $('#description').val(),
                billable:       $('input[name=billable]').val(),
                processed:      $('input[name=processed]').val()
            };

            $.ajax({
                url: '/admin/create',
                type: 'POST',
                data: request_data
            })
            .done(function(result) {

                console.log("success", result);
                var $inputs = $('.dashboard_form input[type=text].form-control');
                $inputs.each(function() {

                    var attr_name = $(this).attr('name');
                    switch(attr_name)
                    {
                        case 'user_id':
                            break;
                        case 'date':
                            break;
                        case 'billable':
                            $(this).val(1);
                            break;
                        case 'processed':
                            $(this).val(0);
                            break;
                        default:
                            $(this).val('');
                            break;
                    }

                });

                $('#project').focus();
                global.App.views.DtDashboard.dashboard_table.api().ajax.reload(null, false);
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
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#dashboard_table').length)
        {
            return false;
        }

        self.init();
        window.oTable = self.dashboard_table;

        // ROADMAP
        $('body').on('click', '.fetch-roadmap', function (e) {

            $.ajax({
                url: '/admin/werklogs/roadmap/fetch',
                type: 'POST',
                dataType: 'json',
                data: {},
            })
            .done(function() {
                console.log("success");
                self.dashboard_table.api().ajax.reload(null, false);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        });
    }
};

module.exports = new DtDashboard();
