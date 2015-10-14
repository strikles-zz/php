'use strict';

var subscription_options = require('./options/_subscriptions_options');



var json_init;
window.Dropzone.autoDiscover = false;

/**
 * [DtSubscriptions - constructor]
 * @param {[type]} options [description]
 */
var DtSubscriptions = function(options)
{
    this.subscriptions_editor         = {};
    this.subscriptions_table          = {};
    this.subscriptions_table_selector = "#subscriptions_table";

    this.renewals_editor              = {};
    this.renewals_table               = {};
    this.renewals_table_selector      = "#subscriptions_renewals_table";

    this.nieuwsbrieven_editor         = {};
    this.nieuwsbrieven_table          = {};
    this.nieuwsbrieven_table_selector = "#subscriptions_nieuwsbrieven_table";

    this.empty_editor              = {};
};

DtSubscriptions.prototype = {

    /**
     * [init_dropzone - setup dropzone options for amazon billing csv file upload]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    init_dropzone: function(options) {

        var $el = $('body');
        if(options && options.view === 'company') {

            $el = options.page.$el;
        }

        // dropzone for uploading images
        $el.find(".dropzone").each(function() {

            var form_action = $(this).attr('action');

            $(this).dropzone({
                url: form_action,
                acceptedFiles: ".csv, .txt",
                accept: function (file, done) {
                    done();
                },
                init: function() {
                    this.on("addedfile", function(file) {
                        console.log("Added file.");
                    });
                }
            });
        });
    },
    /**
     * [keypress_handler - kb editor shortcuts]
     * @param  {[type]} event [description]
     * @return {[type]}       [description]
     */
    keypress_handler: function(event) {

        var self                       = event.data.context;
        var $parent_el                 = $('body');
        if(event.data.options && event.data.options === 'company') {
            $parent_el = event.data.options.page.$el;
        }
        var subscriptions_top_active   = $parent_el.find("ul#company_tabs li.company_subscriptions.active").length > 0;
        var subscriptions_inner_active = $parent_el.find("ul#renewals-tablist li.subscriptions-inner.active").length > 0;
        var search_focused = ($parent_el.find('.dataTables_filter input:focus').length > 0);
        if(search_focused)
        {
            return;
        }

        if(event.data.options && event.data.options.view === "company") {

            if(!subscriptions_top_active || !subscriptions_inner_active) {
                console.log("subscriptions kb skip");
                return;
            }

        } else if (!subscriptions_inner_active) {

            console.log("subscriptions kb skip");
            return;
        }

        var code = event.keyCode || event.which;
        console.log('kb code', code);

        var tt = window.TableTools.fnGetInstance('subscriptions_table');
        if(!tt) {
            return;
        }

        var node = tt.fnGetSelected();
        var selected = tt.fnGetSelectedIndexes();
        var values = self.subscriptions_editor.edit(node[0], false).val();

        console.log('values', values, node[0].id);

        // edit
        if(code === 101 && selected.length === 1)
        {
            self.subscriptions_editor
                .title( 'Edit record' )
                .buttons( { "label": "Update", "fn": function () { self.subscriptions_editor.submit(); } } )
                .edit(selected[0]);
        }

        // remove
        else if(code === 100)
        {
            self.subscriptions_editor
                .title( 'Delete record' )
                .message( "Are you sure you wish to delete this row" + (selected.length > 1 ? "s" : "") + "?" )
                .buttons( { "label": "Delete", "fn": function () { self.subscriptions_editor.submit(); } } )
                .remove(selected);
        }

        // duplicate
        else if(code === 50 && selected.length === 1)
        {
            delete(values['subscriptions.id']);

            var curr_year = new Date().getFullYear();
            values['subscriptions.subscription_start'] = curr_year+'-1-1';
            values['subscriptions.subscription_end'] = curr_year+'-12-31';

            // Create a new entry (discarding the previous edit) and
            // set the values from the read values
            self.subscriptions_editor
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
        self.initEditorInlineListeners(options);
        self.initTableListeners(options);
        self.init_dropzone(options);
    },
    /**
     * [reloadTables - reload all dt tables]
     * @return {[type]} [description]
     */
    reloadTables: function() {

        var self = this;


        self.subscriptions_table.api().ajax.reload(null, false);
        self.nieuwsbrieven_table.api().ajax.reload(null, false);
        self.renewals_table.api().ajax.reload(null, false);

        // self.subscriptions_table.api().ajax.reload();
        // self.renewals_table.api().ajax.reload();
        // self.nieuwsbrieven_table.api().ajax.reload();

        // self.subscriptions_table.api().ajax.reload();
        // self.renewals_table.api().ajax.reload();
        // self.nieuwsbrieven_table.api().ajax.reload();

        //location.reload();

        console.log("Reloading subscription tables");
    },
    /**
     * [getEditorOptions - get editor init options]
     * @param  {[type]} type    [description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getEditorOptions: function(type, options) {

        var self = this;

        var editor_options;
        var editor_fields = subscription_options.getEditorFields(type, options);
        if(type === "subscriptions") {

            editor_options = {
                ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/data",
                table: "#subscriptions_table",
                idSrc: "subscriptions.id",
                fields: editor_fields
            };
        } else if(type === "renewals") {

            editor_options = {
                ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/renewals/data",
                table: "#subscriptions_renewals_table",
                idSrc: "subscriptions.id",
                fields: editor_fields
            };
        } else if(type === "nieuwsbrieven") {

            editor_options = {
                ajax: "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/nieuwsbrieven/data",
                table: "#subscriptions_nieuwsbrieven_table",
                idSrc: "subscriptions.id",
                fields: editor_fields
            };
        }

        return editor_options;
    },
    /**
     * [initEditors - create editor]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditors: function(options) {

        var self = this;

        var subscriptions_editor_options = self.getEditorOptions("subscriptions", options);
        self.subscriptions_editor = global.App.views.Dt.createEditor(self.subscriptions_editor, subscriptions_editor_options);

        var renewals_editor_options = self.getEditorOptions("renewals", options);
        self.renewals_editor = global.App.views.Dt.createEditor(self.renewals_editor, renewals_editor_options);

        var nieuwsbrieven_editor_options = self.getEditorOptions("nieuwsbrieven", options);
        self.nieuwsbrieven_editor = global.App.views.Dt.createEditor(self.nieuwsbrieven_editor, nieuwsbrieven_editor_options);

        self.empty_editor = global.App.views.Dt.createEditor(self.empty_editor, {ajax: '', fields: []});
    },
    /**
     * [initEditorListeners - setup editor event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditorListeners: function(options) {

        var self = this;

        self.renewals_editor.on('close', function ( e, json, data ) {

            // refetch updated list
            //
            self.reloadTables();
            global.App.helpers.subscriptions.init();
            console.log("subs renewal reload");
            //self.renewals_editor.close();
        });

        self.nieuwsbrieven_editor.on('submitSuccess', function ( e, json, data ) {

            // refetch updated list
            global.App.helpers.subscriptions.init();
            self.reloadTables();
            //self.renewals_editor.close();
        });

        self.subscriptions_editor.on('preClose', function( e, json, data) {

            $('body').bind("keypress", {context: self, options: options}, self.keypress_handler);

        }).on('submitSuccess', function ( e, json, data ) {

            self.reloadTables();
            // refetch updated list
            global.App.helpers.subscriptions.init();

        }).on('open', function( e, type ) {

            $( "body").unbind("keypress",  self.keypress_handler);
            self.subscriptions_editor.field( 'subscriptions.service_id' ).update( json_init );

            if(e.delegateTarget.s.action === 'create')
            {
                // corresponding default services
                var create_cat_services = global.App.helpers.services.get();

                var $create_companies_select  = $('#DTE_Field_subscriptions\\.company_id');
                var $create_services_select   = $('#DTE_Field_subscriptions\\.service_id');
                var $create_categories_select = $('#DTE_Field_service_categories\\.id');
                var $create_status_select     = $('#DTE_Field_subscriptions\\.status_id');
                var $periods_select = $('#DTE_Field_subscriptions\\.invoice_periods_id');

                var company_1st_val = $create_companies_select.find('option:first').val();
                $create_companies_select.val(company_1st_val);

                var category_1st_val = $create_categories_select.find('option:first').val();
                $create_categories_select.val(category_1st_val);

                console.log("cat_services", create_cat_services);
                // update select
                self.subscriptions_editor.field( 'subscriptions.service_id' ).update(create_cat_services);

                // set current service id - 1st val
                var service_1st_val = $create_services_select.find('option:first').val();
                console.log('service_1st_val', service_1st_val);
                $create_services_select.val(service_1st_val);

                var default_price = global.App.helpers.services.getDefaultPrice(service_1st_val);
                $('#DTE_Field_subscriptions\\.price').val(default_price);

                var period_1st_val = $periods_select.find('option:first').val();
                $periods_select.val(period_1st_val);

                var default_status_id = global.App.helpers.services.getStatus(service_1st_val);
                $create_status_select.val(default_status_id);

                // dates
                var curr_date = new Date();
                var start_date = global.App.views.Dt.getDate(curr_date);
                var end_date = new Date();

                end_date.setDate(end_date.getDate() - 1);
                end_date.setFullYear(end_date.getFullYear() + 1);
                end_date = global.App.views.Dt.getDate(new Date(end_date));
                //global.App.views.Dt.getDate(new Date(curr_date.setFullYear(2015, curr_date.getMonth(), -1)));
                $('#DTE_Field_subscriptions\\.subscription_start').val(start_date);
                $('#DTE_Field_subscriptions\\.subscription_end').val(end_date);
            }

            else if(e.delegateTarget.s.action === 'edit')
            {
                var $edit_categories_select = $('#DTE_Field_service_categories\\.id');
                var $edit_services_select = $('#DTE_Field_subscriptions\\.service_id');

                // default cat
                console.log(self);
                window.test = self;
                var curr_cat = $edit_categories_select.find('option:selected').val();
                var curr_subscription_id = self.subscriptions_editor.field('subscriptions.id').val();
                var curr_subscription_service_id = global.App.helpers.subscriptions.getServiceByID(curr_subscription_id);
                var curr_service = parseInt(curr_subscription_service_id, 10);
                console.log('curr_cat', curr_cat, 'curr_service', curr_service, '$edit_services_select', $edit_services_select);

                // get corresponding default services
                var edit_cat_services = global.App.helpers.services.getIDsByCategory(curr_cat);
                console.log('edit_cat_services', edit_cat_services);

                // is current item a member of the current cat
                var $service_options = $edit_services_select.find('option');
                $service_options.each(function(){

                    var service_id = parseInt($(this).val(), 10);
                    var service_valid = (edit_cat_services.indexOf(service_id) !== -1);

                    if(!service_valid) {
                        console.log('service invalid');
                        $(this).remove();
                    }
                });
                // update select - set current service id - 1st val
                $edit_services_select.val(curr_service);
            }

        }).on('preSubmit', function ( e, o, a ) {

            console.log(e,o,a);

            var curr_date;
            if(a === "edit" || a === "create"){

            	//delete o.data.subscriptions.id;
            	//delete o.data.service_categories;

                if(options && options.view === 'company')
                {
                    // set company
                    o.data.subscriptions.company_id = options.company_id;
                }

                if(!o.data.subscriptions.invoice_id)
                {
                    o.data.subscriptions.invoice_id = undefined;
                }

                // set start date if empty
                if(!o.data.subscriptions.subscription_start || o.data.subscriptions.subscription_start === '') {

                    curr_date = new Date();
                    o.data.subscriptions.subscription_start = global.App.views.Dt.getDate(curr_date);
                }
                // set end date if empty
                if(!o.data.subscriptions.subscription_end || o.data.subscriptions.subscription_end === '') {

                    var tmp = o.data.subscriptions.subscription_start.split('-');
                    curr_date = new Date(tmp[0], tmp[1]-1, tmp[2]);

                    var end_date = curr_date;
                    end_date.setFullYear(curr_date.getFullYear() + 1);
                    end_date.setDate(end_date.getDate()-1);
                    o.data.subscriptions.subscription_end = global.App.views.Dt.getDate(end_date);
                }

                // set status date if empty
                if(!o.data.subscriptions.status_date || o.data.subscriptions.status_date === '') {

                    o.data.subscriptions.status_date = new Date();
                }
            }
        });


        // listen for cat changes
        $('body').on('change', '#DTE_Field_service_categories\\.id', function() {

            var curr_cat = $(this).val();
            var cat_services = global.App.helpers.services.getByCategoryID(curr_cat);
            var $service_select = $('#DTE_Field_subscriptions\\.service_id');

            self.subscriptions_editor.field( 'subscriptions.service_id' ).update(cat_services);

            var service_1st_val = $service_select.find('option:first').val();
            $service_select.val(service_1st_val);
            $service_select.change();

            var curr_service_id = $('#DTE_Field_subscriptions\\.service_id').val();
            var default_price = global.App.helpers.services.getDefaultPrice(curr_service_id);

            $('#DTE_Field_subscriptions\\.price').val(default_price);
            $('#DTE_Field_subscriptions\\.total_price').val('');

        });

        // default price
        $('body').on('change', '#DTE_Field_subscriptions\\.service_id', function() {

            var curr_service_id = $(this).val();
            var default_price = global.App.helpers.services.getDefaultPrice(curr_service_id);
            var default_status_id = global.App.helpers.services.getStatus(curr_service_id);
            var default_period_id = global.App.helpers.services.getPeriod(curr_service_id);

            $('#DTE_Field_subscriptions\\.price').val(default_price);
            $('#DTE_Field_subscriptions\\.status_id').val(default_status_id);
            $('#DTE_Field_subscriptions\\.invoice_periods_id').val(default_period_id);

        });

        $('body').bind("keypress", {context: self, options: options}, self.keypress_handler);

        $( ".hasDatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

    },
    /**
     * [initEditorInlineListeners - setup editor in-table listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initEditorInlineListeners: function(options) {

        var self = this;

        // Renew in table button
        $('#subscriptions_renewals_table').on('click', 'a.editor_renew', function (e) {

            e.preventDefault();
            var node = $(this).closest('tr');
            if (node.length !== 1) {
                console.log(node);
                return;
            }

            // Place the selected row into edit mode (but hidden),
            // then get the values for all fields in the form
            var values = [];
            values[0] = self.renewals_editor.edit( node[0], false ).val();

            // Create a new entry (discarding the previous edit) and set the values from the read values
            self.renewals_editor
                .title('Renew Subscription')
                .buttons({
                    "label": 'Renew',
                    "fn": function () {

                        var ajax_url = "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/renewals/data";
                        global.App.views.Dt.singularAjaxRequest({"values": values}, ajax_url, self.renewals_editor);
                        //self.reloadTables();
                    }
                })
                .message('Press the "Renew" button to renew the selected subscription')
                .open();
        });

        var $subs_parent_el   = $('#subscriptions_table');
        var $rens_parent_el   = $('#subscriptions_renewals_table');
        var $nieuws_parent_el = $('#subscriptions_nieuwsbrieven_table');

        if(options && options.view === 'company')
        {
            $subs_parent_el = options.table.subscriptions;
            $rens_parent_el = options.table.renewals;
            $nieuws_parent_el = options.table.nieuwsbrieven;
        }

        // Single row selection
        $subs_parent_el.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });

        $rens_parent_el.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });

        $nieuws_parent_el.on( 'click', 'tbody tr', function () {
            $(this).toggleClass('selected');
        });

    },
    getSubscriptionsTTButtons: function(options) {

        var self = this;

        var abuttons = {
            sRowSelect: "multi",
            aButtons: [
                { sExtends: "editor_create", editor: self.subscriptions_editor },
                { sExtends: "editor_edit",   editor: self.subscriptions_editor },
                {
                    sExtends:    "select_single",
                    sButtonText: "2x",
                    fnClick:     function( button, config ) {

                        var node = this.fnGetSelected();
                        if (node.length !== 1) {
                            return;
                        }

                        // Place the selected row into edit mode (but hidden),
                        // then get the values for all fields in the form
                        var values = self.subscriptions_editor.edit(node[0], false).val();
                        //console.log('values', values);
                        delete(values['subscriptions.id']);

                        var curr_year = new Date().getFullYear();
                        values['subscriptions.subscription_start'] = curr_year+'-1-1';
                        values['subscriptions.subscription_end']   = curr_year+'-12-31';

                        // Create a new entry (discarding the previous edit) and
                        // set the values from the read values
                        self.subscriptions_editor
                            .create({
                                title: 'Duplicate Subscription',
                                buttons: 'Create from existing'
                            })
                            .set(values);
                    }
                },
                { sExtends: "editor_remove", editor: self.subscriptions_editor }
            ]
        };

        return abuttons;
    },
    getRenewalsTTButtons: function(options) {

        var self = this;

        var abuttons = {
            sRowSelect: "multi",
            aButtons: [
                {
                    sExtends: 'select_all',
                    sButtonText: 'Renew All',
                    fnClick: function (nButton, oConfig, oFlash) {

                        self.empty_editor
                            .title('Renew ALL subscriptions')
                            .buttons({
                                label: "Renew All",
                                fn: function () {

                                    console.log("renewal");
                                    var json_init;

                                    $.ajax({

                                        url: "/admin/subscriptions/renewals/all",
                                        type: "GET",
                                        dataType: "json"

                                    }).done(function(data, textStatus, jqXHR) {

                                        console.log('subscriptions', data.length);

                                        var requests = [];
                                        var total_complete = 0;
                                        $('.DTE_Form_Info').html(global.App.views.Dt.progress_html);
                                        json_init = data;

                                        $.each(json_init, function(ndx, value) {

                                            //request.push(data[ndx].id);
                                            console.log('subscriptions id', json_init[ndx]);
                                            // push jqXHR to requests array
                                            requests.push(

                                                // this will return a deferred jqXHR object with 2 relevant methods
                                                // (resolve on sucess, reject on error)
                                                $.ajax({
                                                    url: '/admin/subscriptions/'+json_init[ndx].id+'/renew',
                                                    type: 'POST',
                                                    dataType: 'json'
                                                })
                                                .done(function(data, textStatus, jqXHR) {
                                                    console.log("subscription renewed", json_init[ndx].id);
                                                    $('.progress-message').html('<p>Item '+ndx+' OK'+'</p>');
                                                    total_complete++;
                                                    var bar_width = (100.0*total_complete/json_init.length).toString()+'%';
                                                    $('.progress-bar').width(bar_width);
                                                })
                                                .fail(function(jqXHR, textStatus, errorThrown) {
                                                    console.log("subscription renewal failed", json_init[ndx].id);
                                                    $('.progress-message').html('<p>Item '+ndx+' Failed'+'</p>');
                                                })
                                            );
                                        });

                                        var successCallback = function() {

                                            self.empty_editor.close();
                                            self.reloadTables();
                                        };
                                        var failureCallback = function() {
                                            self.reloadTables();
                                        };

                                        // $.when doesn't take arrays as an argument, so we use apply to expand the result
                                        // returns a master deferred that will be resolved when all promises are resolved
                                        // and will be rejected if any of the promises are rejected
                                        $.when.apply(undefined, requests).then(successCallback, failureCallback);


                                        //console.log("renewal success", data);
                                        //self.reloadTables();
                                        //
                                    }).fail(function(){

                                        console.log("renewal failure");

                                    });
                                }
                            })
                            .message("Press the 'Renew All' button to attempt renewing ALL withstanding subscriptions in th DB.")
                            .edit();
                    }
                },{
                    sExtends:    "select",
                    sButtonText: "Renew Selected",
                    fnClick:     function( button, config ) {

                        var values = [];
                        var node = this.fnGetSelected();
                        //console.log('renewals nodes', node);

                        $.each(node, function(index, value) {
                            // Place the selected row into edit mode (but hidden), then get the values for all fields in the form
                            values[index] = self.renewals_editor.edit(node[index], false).val();
                        });
                        //console.log('renewals values', values);

                        self.renewals_editor
                            .title( 'Renew selected subscriptions' )
                            .buttons({
                                "label": "Renew Selected",
                                "fn": function () {

                                    var url = "/admin/"+(options && options.view === 'company' ? "companies/"+options.company_id+"/" : "")+"subscriptions/renewals/data";
                                    global.App.views.Dt.multipleAjaxRequests({"values": values}, url, self.renewals_editor);
                                }
                            })
                            .message('Press the "Renew Selected" button to renew the selected subscriptions.')
                            .open();
                    }
                }
            ]
        };

        return abuttons;
    },
    getNieuwsbrievenTTButtons: function(options) {

        var self = this;

        var abuttons = {
            sRowSelect: "multi",
            aButtons: [
                { sExtends: "editor_edit",   editor: self.nieuwsbrieven_editor }
            ]
        };

        return abuttons;
    },
    /**
     * [getTableOptions]
     * @param  {[type]} type    [description]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    getTableOptions: function(type, options) {

        var self = this;

        var table_options,
            table_buttons;

        if(type === "subscriptions") {
            table_options = subscription_options.getSubscriptionsTableOptions(options, self.subscriptions_editor);
            table_buttons = self.getSubscriptionsTTButtons(options);
        } else if(type === "renewals") {
            table_options = subscription_options.getRenewalsTableOptions(options, self.renewals_editor);
            table_buttons = self.getRenewalsTTButtons(options);
        } else if(type === "nieuwsbrieven") {
            table_options = subscription_options.getNieuwsbrievenTableOptions(options, self.nieuwsbrieven_editor);
            table_buttons = self.getNieuwsbrievenTTButtons(options);
        }

        $.extend(table_options, {tableTools: table_buttons});
        return table_options;
    },
    /**
     * [initTables - create dt tables]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTables: function(options) {

        var self = this;

        // subscriptions
        var subscriptions_table_options = self.getTableOptions("subscriptions", options);
        self.subscriptions_table = global.App.views.Dt.createTable(self.subscriptions_table, (options && options.view === "company" ? options.table.subscriptions : self.subscriptions_table_selector), subscriptions_table_options);

        // renewals
        var renewals_table_options = self.getTableOptions("renewals", options);
        self.renewals_table = global.App.views.Dt.createTable(self.renewals_table, (options && options.view === "company" ? options.table.renewals : self.renewals_table_selector), renewals_table_options);

        // renewals
        var nieuwsbrieven_table_options = self.getTableOptions("nieuwsbrieven", options);
        self.nieuwsbrieven_table = global.App.views.Dt.createTable(self.nieuwsbrieven_table, (options && options.view === "company" ? options.table.nieuwsbrieven : self.nieuwsbrieven_table_selector), nieuwsbrieven_table_options);
    },
    /**
     * [initTableListeners - setup dt table event listeners]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initTableListeners: function(options) {

        var self = this;
        self.subscriptions_table.on('init.dt', function(e, settings, json)
        {

            //console.log('init event fired', json);
            // Populate the site select list with the data available in the database on load
            if(!options) {
                self.subscriptions_editor.field( 'subscriptions.company_id' ).update( json.companies );
            }
            self.subscriptions_editor.field( 'service_categories.id' ).update( json.service_categories );
            self.subscriptions_editor.field( 'subscriptions.service_id' ).update( json.services );
            self.subscriptions_editor.field( 'subscriptions.status_id' ).update( json.statuses );
            self.subscriptions_editor.field( 'subscriptions.invoice_periods_id' ).update( json.invoice_periods );

            json_init = json.services;
        });
    },

    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#subscriptions-container').length)
        {
            return false;
        }

        self.init();
        window.oTable = self.subscriptions_table;
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

        var $subscriptions_container = page.$el.find('.subscriptions-container');
        if(!$subscriptions_container.length)
        {
            return false;
        }

        var $subscriptions_table = $subscriptions_container.find('#subscriptions_table');
        var $renewals_table      = $subscriptions_container.find('#subscriptions_renewals_table');
        var $nieuwsbrieven_table = $subscriptions_container.find('#subscriptions_nieuwsbrieven_table');

        var options = { view: "company", page: e.page, company_id: page.modelID, table: { subscriptions: $subscriptions_table, renewals: $renewals_table, nieuwsbrieven: $nieuwsbrieven_table }};
        self.init(options);

        window.oTable = self.subscriptions_table;
    }
};

module.exports = new DtSubscriptions();
