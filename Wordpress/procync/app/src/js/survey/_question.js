'use strict';

//var $ = require('jquery');
var $ = global.$;

var Question = function() {

    var self = this,
        survey_id,
        group,
        question,
        $help,
        $el;

    return self;
};

Question.prototype = {

    /**
     * [init - initialize object]
     * @param  {[type]} survey_id    [description]
     * @param  {[type]} question_obj [description]
     * @param  {[type]} ndx          [description]
     * @return {[type]}              [description]
     */
    init: function(survey_id, question_obj, ndx) {

        var self = this;

        self.survey_id    = survey_id;
        self.group        = question_obj.g;
        self.question     = question_obj.q;
        self.question_num = question_obj.q_num;

        self.generateDOMel(ndx);
    },

    /**
     * [questionID get the limesurvey question ID]
     * @return {[type]} [description]
     */
    questionID: function() {

        var self = this;

        return self.survey_id+'X'+self.group.id.gid+'X'+self.question.id.qid;
    },

    /**
     * [generateDOMel - generate question li to insert in DOM]
     * @param  {[type]} ndx [description]
     * @return {[type]}     [description]
     */
    generateDOMel: function(ndx) {

        var self = this;

        self.question_id = self.questionID();
        switch(ndx)
        {
            case 0:
                self.$help = $("<li class='current inactive' data-qnum='"+self.question_num+"' data-qid='"+self.question_id+"' data-gid='"+self.group.id.gid+"'>"+self.question.help+"</li>");
                self.$el = $("<li class='current' data-qnum='"+self.question_num+"' data-qid='"+self.question_id+"' data-gid='"+self.group.id.gid+"'>"+self.question.question.toLowerCase()+"</li>");
                break;

            case 1:
                self.$help = $("<li class='inactive' data-qnum='"+self.question_num+"' data-qid='"+self.question_id+"' data-gid='"+self.group.id.gid+"'>"+self.question.help+"</li>");
                self.$el = $("<li class='next' data-qnum='"+self.question_num+"' data-qid='"+self.question_id+"' data-gid='"+self.group.id.gid+"'>"+self.question.question.toLowerCase()+"</li>");
                break;

            default:
                self.$help = $("<li class='inactive' data-qnum='"+self.question_num+"' data-qid='"+self.question_id+"' data-gid='"+self.group.id.gid+"'>"+self.question.help+"</li>");
                self.$el = $("<li class='inactive' data-qnum='"+self.question_num+"' data-qid='"+self.question_id+"' data-gid='"+self.group.id.gid+"'>"+self.question.question.toLowerCase()+"</li>");
                break;
        }
    }
};

module.exports = Question;