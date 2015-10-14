'use strict';

//var $ = require('jquery');
var $ = global.$;
var _ = require('underscore');
var History = window.History;

var TweenLite = global.TweenLite;

var Survey = function()
{
    this.answers = {};
    this.questionObjects = [];
    this.parent_el = undefined;
};

Survey.prototype = {

    /**
     * [exchangeData - generic fnc for async data fetching]
     * @param  {[type]} postData [description]
     * @param  {[type]} storage  [description]
     * @return {[type]}          [description]
     */
    exchangeData: function(postData, storage)
    {
        var self = this;

        return $.ajax({

            url: '/cms/wp-admin/admin-ajax.php',
            type: 'POST',
            dataType: 'json',
            data: postData

        }).done(function(data) {
            self[storage] = data;
        });
    },

    /**
     * [fetchData fetches questions and groups for all steps of the questionaire relation]
     * @param  {Function} callback [description]
     * @return {[type]}            [description]
     */
    fetchData: function(callback) {

        var self = this;

        var async_deferreds = [];
        if(self.do180)
        {
            var agency_groups_data = {action: 'getGroups', userRole: self.user_role, limesurvey_id: self.agency_surveyid, step: '180'};
            async_deferreds.push(self.exchangeData(agency_groups_data, 'agency_groups'));
            var agency_questions_data = {action: 'getQuestions', userRole: self.user_role, limesurvey_id: self.agency_surveyid, step: '180'};
            async_deferreds.push(self.exchangeData(agency_questions_data, 'agency_questions'));
        }

        if(self.do360)
        {
            var company_groups_data = {action: 'getGroups', userRole: self.user_role, limesurvey_id: self.company_surveyid, step: '360'};
            async_deferreds.push(self.exchangeData(company_groups_data, 'company_groups'));
            var company_questions_data = {action: 'getQuestions', userRole: self.user_role, limesurvey_id: self.company_surveyid, step: '360'};
            async_deferreds.push(self.exchangeData(company_questions_data, 'company_questions'));
        }

        // when all async data fetching is done
        $.when.apply($, async_deferreds).then(function(schemas)
        {
            if (!schemas) {
                throw ('ERROR: no survey data retrieved by the fetchData call');
            }

            if(self.do180)
            {
                self.curr_step = '180';
                self.groups = self.agency_groups;
                self.questions = self.agency_questions;
            }
            else
            {
                self.curr_step = '360';
                self.groups = self.company_groups;
                self.questions = self.company_questions;
            }

            console.log('groups', self.groups);
            console.log('questions', self.questions);

            self.initGroups();
            self.initQuestions();

            if (callback && typeof callback == 'function') {
                callback();
            }

        }, function(e) {
            console.log("My ajax failed");
        });

        return self;
    },

    /**
     * [initGroups - initializes groups related DOM elements]
     * used on init and reset360
     * @return {[type]} [description]
     */
    initGroups: function() {

        var self = this;

        self.group_gids = [];
        self.group_last_question = {};
        self.num_groups = self.groups.length;
        var width_perc  = 100.0/self.num_groups;

        $('.groups-nav > ul').empty();
        $('.nav-background').remove();
        $('.introgroups-ul').empty();

        $.each(self.groups, function(index, el) {

            self.group_gids.push(el.group.id.gid);
            self.group_last_question[el.group.id.gid] = -1;

            var li_class  = 'text-center';
            var img_class = 'nav-background';

            if(index === 0)
            {
                self.curr_group = el.group.id.gid;
                li_class  = 'text-center active';
                img_class = 'nav-background active';
            }

            // append intro groups li
            var intro_li_class = '';
            var $intro_li = $("<li class='text-center'>"+el.group.group_name+"</li>").addClass('question-group-' + (index + 1) );
            $('.introgroups-ul').append($intro_li);

            // append nav li
            var li_content = (index === 0 ? '1/'+el.num_questions : el.num_questions);
            var $li = "<li class='"+li_class+"' style='width:"+width_perc+"%'><a href='#' data-gid='"+el.group.id.gid+"' data-num-questions='"+el.num_questions+"' target='_blank'>"+li_content+"</a></li>";
            $('.groups-nav ul').append($li);

            // append nav background
            var nav_background_img_path = "/content/themes/procync/app/assets/images/nav/nav"+self.groups.length+"-"+index+".png";
            var $img = $('<img src="'+nav_background_img_path+'" alt="previous" data-ndx="'+index+'" class="'+img_class+'">');
            $('.procyncRoot .category-navigation-container').prepend($img);

        });

        $('.group-header').html(self.groups[0].group.group_name).attr('data-group-id', self.groups[0].group.id.gid);;
    },


    /**
     * [initGroups - initializes questions related DOM elements]
     * used on init and reset360
     */
    initQuestions: function() {

        var self = this;
        self.$questionContainer = $('.question-container'),
        self.$helpContainer     = $('.help-container');

        self.$questionContainer.empty();
        self.$helpContainer.empty();

        self.num_questions     = self.questions.length;
        self.curr_question_ndx = 0;
        self.prev_question_ndx = self.num_questions -1;
        self.next_question_ndx = 1;

        $.each(self.questions, function(index, el)
        {
            var question = new global.App.question;
            question.init(self.survey_id, el, index);
            self.$questionContainer.append(question.$el);
            self.$helpContainer.append(question.$help);
            self.questionObjects.push(question);
        });

        // setup input for 1st question
        var curr_question_id = self.$questionContainer.find("li:eq("+self.curr_question_ndx+")").attr('data-qid');
        $('input.slider:first').attr('data-qid', curr_question_id);
        $('.go-next-question').addClass('inactive');
    },


    /**
     * [init - called on document ready]
     * @return {[type]} [description]
     */
    init: function() {

        var self = this;

        self.isAnimating        = false;
        self.$questionContainer = $('.question-container');

        self.do180              = parseInt($('.procyncRoot').attr('data-do180'), 10);
        self.do360              = parseInt($('.procyncRoot').attr('data-do360'), 10);
        self.curr_step          = (!self.do180 ? '360' : '180');

        self.user_role          = $('.procyncRoot').attr('data-userrole');
        self.user_type          = $('.procyncRoot').attr('data-usertype');
        self.user_relationship  = $('.procyncRoot').attr('data-userrelationship');
        self.relationship_type  = $('.procyncRoot').attr('data-relationshiptype');

        self.agency_name        = $('.procyncRoot').attr('data-agencyname');
        self.company_name       = $('.procyncRoot').attr('data-companyname');
        self.agency_surveyid    = $('.procyncRoot').attr('data-survey_id_180');
        self.company_surveyid   = $('.procyncRoot').attr('data-survey_id_360');

        if(self.do180)
        {
            self.survey_id = self.agency_surveyid;
            $('.content-180').show();
            $('.content-360').hide();
        }
        else
        {
            self.survey_id = self.company_surveyid;
            $('.content-360').show();
            $('.content-180').hide();
        }

        $('.group-header, .procyncRoot').removeClass('group-cat1 group-cat2 group-cat3 group-cat4 group-cat5').addClass('group-cat1');

        if(!(self.do180 && self.do360)) {
            $('.reset360orExit').remove();
        }

        if(self.do180 && self.do360) {
            $('.closeWindow').hide();
        }

        $('.procyncIntro').show();
        $('.procyncIntro').css('display', 'block');

        self.answers = {};
        var $slider = $('.survey-range-slider');
        self.fetchData(function() {
            $slider.attr('data-qid', self.questionObjects[0].question_id);
        });
        self.bindEvents();
        self.setTitle();


        var rangeslider_options = {

            polyfill: false,
            rangeClass: 'rangeslider',
            fillClass: 'rangeslider__fill',
            handleClass: 'rangeslider__handle',

            onInit: function() {},
            onSlide: function(position, value) {

                this.$element.siblings('.input-val').html(value.toFixed(1));
                if($('.go-next-question').hasClass('inactive')) {
                    $('.go-next-question').removeClass('inactive');
                }
            }
        }

        if(global.platform.name === "IE" && parseInt(global.platform.version, 10) < 10) {
            rangeslider_options.polyfill = true;
        }

        $('input.slider').rangeslider(rangeslider_options);

        console.log('platform', platform.name);
        if (platform.name === 'Safari' && platform.os.family === 'iOS' && parseInt(platform.os.version, 10) > 7 || platform.ua.indexOf('like Mac OS X') != -1) {
            $('.lower-inputs').css('bottom', '8rem');
        }

    },

    /**
     * [reset360orExit - similar to above - called on transition from 180 to 360]
     * @return {[type]} [description]
     */
    reset360orExit: function() {

        var self = this;

        $('input.slider').bind("change paste keyup", function() {
            $('.input-val').html($('input.slider').val());
        });

        $('.group-header, .procyncRoot').removeClass('group-cat1 group-cat2 group-cat3 group-cat4 group-cat5').addClass('group-cat1');

        // reset all the things
        if(self.relationship_type === '360') {

            if(self.curr_step === '180') {

                self.curr_step = '360';

                // $('.main-content').show();
                $('.posted-answers').empty();
                $('.answers').hide();
                $('.reset360orExit').remove();
                $('.closeWindow').show();

                $('.content-360').show();
                $('.content-180').hide();

                $('.login-content2').hide();
                $('.login-content').show();

                $('.login-action2').hide();
                $('.login-action').show();
                $('.lower-inputs').show();

                $('.category-navigation-container').show();
                $('.groups-nav').show();

                $('.procyncIntro').show();

                // FFF
                self.survey_id        = self.company_surveyid;

                self.answers   = {};
                self.groups    = self.company_groups;
                self.questions = self.company_questions;

                self.initGroups();
                self.initQuestions();
                self.setTitle();

                self.setContentTopMargin();
            }

        } else if(self.relationship_type === '180') {

            console.log('Error: this is a 180');
        }
    },

    /**
     * [updateNav - uses for updating navbar when current question group changes]
     * @param  {[type]} $curr_el [description]
     * @return {[type]}          [description]
     */
    updateNav: function($curr_el) {

        var self = this;

        // get current question group attributes
        var curr_question_group = $curr_el.attr('data-gid');
        var li_ndx              = _.indexOf(self.group_gids, curr_question_group);

        var $curr_group_questions = $('.question-container li[data-gid="'+curr_question_group+'"]');
        var q_num               = 0;

        if(!$curr_group_questions.hasClass('current')) {
            console.log('weirdness - no current in .current group ??? ', $(this));
            return false;
        }

        $curr_group_questions.each(function() {

            if($(this).hasClass('current')) { return false;}
            q_num++;
        });

        self.group_last_question[curr_question_group] = self.curr_question_ndx;
        console.log('last questions', self.group_last_question);

        var increment = li_ndx+1;
        var new_class_name = (self.curr_step === '180' ? 'group-cat'+increment : 'group360-cat'+increment);

        var all_group_cat_classes = 'group-cat1 group-cat2 group-cat3 group-cat4 group-cat5 group360-cat1 group360-cat2 group360-cat3';
        $('.group-header, .procyncRoot').removeClass(all_group_cat_classes).addClass(new_class_name);
        if(curr_question_group !== self.curr_group)
        {
            // update group-header
            $('.group-header').html(self.groups[li_ndx].group.group_name).attr('data-group-id', self.groups[li_ndx].group.id.gid);

            // get prev group li ndx
            var prev_li_ndx = _.indexOf(self.group_gids, self.curr_group);

            // reset prev group
            $('.groups-nav ul li:eq('+prev_li_ndx+')').removeClass('active');
            $('.groups-nav ul li:eq('+li_ndx+')').addClass('active');
            $('.groups-nav ul li:eq('+prev_li_ndx+') a').html(self.groups[prev_li_ndx].num_questions);
            self.curr_group = curr_question_group;

            // update previous background class
            $('.nav-background[data-ndx='+prev_li_ndx+']').removeClass('active');
            $('.nav-background[data-ndx='+li_ndx+']').addClass('active');
        }

        var group_text = (q_num+1)+'/'+self.groups[li_ndx].num_questions;
        $('.groups-nav ul li:eq('+li_ndx+') a').html(group_text);
    },

    /**
     * [goToQuestion - go to a specific question without doing any animations]
     * called when :
     *     1) selecting a different group in the navbar
     *     2) found somethng incomplete upon saving answers
     *
     * @param  {[type]} question_ndx [description]
     * @param  {[type]} $nav_el      [description]
     * @return {[type]}              [description]
     */
    goToQuestion: function(question_ndx, $nav_el) {

        var self = this;
        console.log('ndx', question_ndx);

        if(question_ndx !== -1) {

            // reset markers
            self.curr_question_ndx = question_ndx;
            self.prev_question_ndx = (self.curr_question_ndx > 0 ? self.curr_question_ndx - 1 : self.num_questions - 1);
            self.next_question_ndx = (self.curr_question_ndx < self.num_questions - 1 ? self.curr_question_ndx + 1 : 0);

            // reset li next previous
            self.$questionContainer.find("li").removeClass('next').removeClass('previous').removeClass('current').removeClass('inactive').addClass('inactive');
            self.$helpContainer.find("li").removeClass('next').removeClass('previous').removeClass('current').removeClass('inactive').addClass('inactive');

            // reset current
            var $new_prev_el;
            if(self.prev_question_ndx !== self.num_questions - 1) {
                $new_prev_el = self.$questionContainer.find("li:eq("+self.prev_question_ndx+")");
                $new_prev_el.removeClass("inactive").addClass('previous');
            }

            var $new_curr_el = self.$questionContainer.find("li:eq("+self.curr_question_ndx+")");
            var $new_curr_help_el = self.$helpContainer.find("li:eq("+self.curr_question_ndx+")");
            $new_curr_el.removeClass("inactive").addClass('current');
            $new_curr_help_el.addClass('current');
            $new_curr_el.css('opacity', 1);

            var $new_next_el;
            if(self.next_question_ndx !== 0) {
                $new_next_el = self.$questionContainer.find("li:eq("+self.next_question_ndx+")");
                $new_next_el.removeClass("inactive").addClass('next');
            }

            var curr_question_id = $new_curr_el.attr('data-qid');
            $('input.slider').attr('data-qid', curr_question_id);

            // set input value
            if(self.answers.hasOwnProperty(curr_question_id))
            {
                $('input.slider').val(self.answers[curr_question_id]);
                $('.input-val').html($('input.slider').val());
            }

            self.updateNav($new_curr_el);
        }

        $('.groups-nav li').removeClass('active');
        $nav_el.closest('li').addClass('active');
    },

    /**
     * [nextAnim - move forward]
     * used by nextQuestion
     * @return {[type]} [description]
     */
    nextAnim: function() {

        var self = this;

        var $helpContainer     = $('.help-container');

        // remove old prev
        if(self.next_question_ndx !== 0)
        {
            var $old_prev_el = self.$questionContainer.find("li:eq("+self.prev_question_ndx+")");
            TweenLite.to($old_prev_el, 0, {autoAlpha:0, className:"inactive"});
        }

        // update li's ndx's
        self.curr_question_ndx = (self.curr_question_ndx + 1 > self.num_questions - 1 ? 0 : self.curr_question_ndx + 1);
        self.prev_question_ndx = (self.prev_question_ndx + 1 > self.num_questions - 1 ? 0 : self.prev_question_ndx + 1);
        self.next_question_ndx = (self.next_question_ndx + 1 > self.num_questions - 1 ? 0 : self.next_question_ndx + 1);

        // add new prev
        var $new_prev_el = self.$questionContainer.find("li:eq("+self.prev_question_ndx+")");
        TweenLite.to($new_prev_el, 0.5, {autoAlpha:1, className:"previous"});

        // curr help
        self.$helpContainer.find("li").removeClass('next').removeClass('previous').removeClass('current').removeClass('inactive').addClass('inactive');
        var $new_curr_help_el = self.$helpContainer.find("li:eq("+self.curr_question_ndx+")");
        $new_curr_help_el.addClass('current');

        // add new current
        var $new_curr_el = self.$questionContainer.find("li:eq("+self.curr_question_ndx+")");
        TweenLite.to($new_curr_el, 0.5, {autoAlpha:1, className:"current"});

        // add new next
        if(self.next_question_ndx !== 0) {
            var $new_next_el = self.$questionContainer.find("li:eq("+self.next_question_ndx+")");
            TweenLite.to($new_next_el, 0, {autoAlpha:0, className:"next"});
        }
        //TweenLite.to($('#question-container'), 0.2, {top: 0 - $new_prev_el.position().top});

        setTimeout(function() {
            self.updateNav($new_curr_el);
        }, 700);

    },

    /**
     * [prevAnim - move back]
     * used by prevQuestion
     * @return {[type]} [description]
     */
    prevAnim: function() {

        var self = this;

        var $helpContainer     = $('.help-container');

        // remove old next
        var $old_next_el = self.$questionContainer.find("li:eq("+self.next_question_ndx+")");
        TweenLite.to($old_next_el, 0, {autoAlpha:0, className:"inactive"});

        // update li ndx's
        self.curr_question_ndx = (self.curr_question_ndx - 1 < 0 ? self.num_questions - 1 : self.curr_question_ndx - 1);
        self.prev_question_ndx = (self.prev_question_ndx - 1 < 0 ? self.num_questions - 1 : self.prev_question_ndx - 1);
        self.next_question_ndx = (self.next_question_ndx - 1 < 0 ? self.num_questions - 1 : self.next_question_ndx - 1);

        console.log('prev anim ndxs', self.curr_question_ndx, self.prev_question_ndx, self.next_question_ndx);

        // add new next
        var $new_next_el = self.$questionContainer.find("li:eq("+self.next_question_ndx+")");
        TweenLite.to($new_next_el, 0.5, {autoAlpha:1, className:"next"});

        // curr help
        $helpContainer.find("li").removeClass('next').removeClass('previous').removeClass('current').removeClass('inactive').addClass('inactive');
        var $new_curr_help_el = self.$helpContainer.find("li:eq("+self.curr_question_ndx+")");
        $new_curr_help_el.addClass('current');

        // add new curr
        var $new_curr_el = self.$questionContainer.find("li:eq("+self.curr_question_ndx+")");
        TweenLite.to($new_curr_el, 0.5, {autoAlpha:1, className:"current"});

        // add new prev
        if(self.prev_question_ndx !== self.num_questions - 1) {
            var $new_prev_el = self.$questionContainer.find("li:eq("+self.prev_question_ndx+")");
            TweenLite.to($new_prev_el, 0, {autoAlpha:0, className:"previous"});
        }

        var $discount_el = ($new_prev_el ? $new_prev_el : $new_curr_el);
        //TweenLite.to($('#question-container'), 0.2, {top: 0 - $discount_el.position().top});

        setTimeout(function() {
            self.updateNav($new_curr_el);
        }, 700);
    },

    /**
     * [nextQuestion - go forward by 1 question]
     * @return {[type]} [description]
     */
    nextQuestion: function() {

        var self = this,
        $slider = $('.survey-range-slider'),
        $sliderValueContainer = $slider.prev('.input-val');
        self.isAnimating = true;

        // get input value
        var answer_val = $slider.val();
        var answer_id = $slider.attr('data-qid');
        self.answers[answer_id] = answer_val;

        // last question
        if(self.curr_question_ndx === self.num_questions-1) {

            var $el = self.verifyAnswers();
            if($el === false)
            {
                $('.main-content').hide();
                $('.lower-inputs').hide();
                self.saveAnswers();

            } else {

                console.log('going to missed question');

                var question_ndx = $el.index();
                var group_id = $el.attr('data-gid');
                var $nav_el = $(".groups-nav a[data-gid="+group_id+"]");
                self.goToQuestion(question_ndx, $nav_el);
            }

        // just another question
        } else {

            self.nextAnim();

            // set input qid
            var curr_question_id = self.$questionContainer.find("li:eq("+self.curr_question_ndx+")").attr('data-qid');
            $slider.attr('data-qid', curr_question_id);

            // set input value
            if(self.answers.hasOwnProperty(curr_question_id)) {
                $slider.val(self.answers[curr_question_id]);
            } else {
                $slider.val(5);
            }

            $sliderValueContainer.html($slider.val());
            //history.pushState({q_ndx: self.curr_question_ndx}, null, null);
            History.pushState({q_ndx: self.curr_question_ndx}, null, null);
        }

        $('input[type="range"]').rangeslider('update', true);
        $('.go-next-question').addClass('inactive');

        self.isAnimating = false;
    },

    /**
     * [prevQuestion - go back by 1 question]
     * @return {[type]} [description]
     */
    prevQuestion: function() {

        var self = this,
            $slider = $('.survey-range-slider'),
            $sliderValueContainer = $slider.prev('.input-val');

        self.isAnimating = true;
        if(self.curr_question_ndx !== 0) {

            self.prevAnim();
            var curr_question_id = self.$questionContainer.find("li:eq("+self.curr_question_ndx+")").attr('data-qid');
            $slider.attr('data-qid', curr_question_id);

            // set input value
            if(self.answers.hasOwnProperty(curr_question_id))
            {
                $slider.val(self.answers[curr_question_id]);
                $sliderValueContainer.html($slider.val());
            }

            $(window).trigger("popstate");
        }

        $('input[type="range"]').rangeslider('update', true);
        self.isAnimating = false;
    },

    verifyAnswers: function() {

        var self = this;

        console.log('all qo', self.questionObjects, self.answers);
        for(var qo in self.questionObjects)
        {
            console.log('>>> qo ', self.answers[self.questionObjects[qo].question_id], self.questionObjects[qo].question_id);
            if(self.answers[self.questionObjects[qo].question_id] === undefined)
            {
                var $el = self.$questionContainer.find("li[data-qid="+self.questionObjects[qo].question_id+"]");
                if($el.length > 0) {
                    return $el;
                }
                else {
                    return false;
                }
            }
        }

        return false;
    },

    /**
     * [saveAnswers description]
     * @return {[type]} [description]
     */
    saveAnswers: function() {

        var self = this;

        var post_data = {};
        $.extend(true, post_data, self.answers, {action: 'postAnswers', limesurvey_id: self.survey_id, evaluation_id: self.user_relationship, step: self.curr_step});
        $('.posted-answers').empty();

        var response_status;
        $.when(self.exchangeData(post_data, response_status)).done(function(data) {

            console.log('answers response', data);
            if(data.status === 'OK')
            {
                $('.category-navigation-container').hide();
                $('.groups-nav').hide();
                $('.answers').show();

                console.log('Responses saved');
            }
            else
            {
                console.log('ERROR', data.message);
            }
        });
    },

    /**
     * [setContentTopMargin description]
     */
    setContentTopMargin: function() {

        var self = this;
        $(document).on('click', 'button.login-action2', function() {

            var self = this;
            var groups_height = $('.nav-background:first').height();

            $('.groups-nav').height(groups_height);
            $('.groups-ul').height(groups_height);

        })
    },


    /**
     * [setTitle description]
     */
    setTitle: function()
    {
        var self = this;
        var title_str = '';

        if(self.curr_step === '180')
        {
            title_str = self.agency_name;
        }
        else if(self.curr_step === '360')
        {
            title_str = self.company_name;
        }
        else
        {
            title_str = 'Error';
        }

        $('.rel-title').html(title_str);
    },


    /**
     * [bindEvents - bind all required events]
     * @return {[type]} [description]
     */
    bindEvents: function() {

        var self = this;

        // orientation lock
        $(window).bind('orientationchange', function(e) {

            switch ( window.orientation ) {
                case 0:
                    $('.turnDeviceNotification').css('display', 'none');
                    // The device is in portrait mode now
                    break;

                case 180:
                    $('.turnDeviceNotification').css('display', 'none');
                    // The device is in portrait mode now
                    break;

                case 90:
                    // The device is in landscape now
                    $('.turnDeviceNotification').css('display', 'block');
                    break;

                case -90:
                    // The device is in landscape now
                    $('.turnDeviceNotification').css('display', 'block');
                    break;
            }

        });

        // intro setup
        if($('.procyncIntro').length) {

            $('body').on('click', '.login-action', function(ev)
            {
                ev.preventDefault();
                $('.login-content').hide();
                $('.login-content2').show();
                $('.login-action').hide();
                $('.login-action2').show();
            });

            $('body').on('click', '.login-action2', function(ev)
            {
                ev.preventDefault();
                $('.question-container').css('top', 0);
                $('.procyncIntro').hide();
                $('.main-content').show();
                $('.procyncRoot').show();
                self.setContentTopMargin();
            });
        }

        // main questionaire setup
        if($('.procyncRoot').length) {

            // Bind to StateChange Event - this is meant to use statechange but thta fires all the time :(
            History.Adapter.bind(window, 'statechange', function(evt){ // Note: We are using statechange instead of popstate
                var State = History.getState(); // Note: We are using History.getState() instead of event.state
                //History.log(State.data, State.title, State.url);

                var question_ndx = State.data.q_ndx;
                var group_id = self.$questionContainer.find("li:eq("+question_ndx+")").attr('data-gid');
                var $nav_el = $(".groups-nav a[data-gid="+group_id+"]");
                //self.goToQuestion(State.q_ndx, $nav_el);

                console.log('popstate', question_ndx, State);
            });

            // // back button browser history
            // window.addEventListener("popstate", function(e) {

            //     e.preventDefault();

            //     var question_ndx = e.state.q_ndx;
            //     var group_id = self.$questionContainer.find("li:eq("+question_ndx+")").attr('data-gid');
            //     var $nav_el = $(".groups-nav a[data-gid="+group_id+"]");
            //     self.goToQuestion(e.state.q_ndx, $nav_el);

            //     return true;
            // });

            $(window).resize(function() {
                self.setContentTopMargin();
            });

            $('body').on('click','.reset360orExit', function(ev) {
                ev.preventDefault();
                self.reset360orExit();
            });

            $('body').on('click','.go-prev-question', function() {
                self.prevQuestion();
            });

            $('body').on('click','.go-next-question', function() {

                if($('.go-next-question').hasClass('inactive')) {
                    $('.go-next-question').removeClass('inactive');
                } else {
                    self.nextQuestion();
                }
            });

            $('.help-toggle').click(function(evt) {
                evt.preventDefault();
                var $help_status = $('.help-container').find('.current');
                if($help_status.hasClass('inactive')) {
                    $help_status.removeClass('inactive');
                } else {
                    $help_status.addClass('inactive');
                }

            });

            $('body').on('click', '.groups-nav a', function(ev) {

                var $el = $(this);

                ev.preventDefault();
                var gid = $(this).attr('data-gid');

                // find last answered question with within group
                // var question_ndx = self.$questionContainer.find("li[data-gid="+gid+"]:first").index();
                var question_ndx = self.group_last_question[gid];
                if(-1 === question_ndx) {
                    return false;
                } else {
                    self.goToQuestion(question_ndx, $el);
                }

            });
        }
    }
};

module.exports = new Survey();
