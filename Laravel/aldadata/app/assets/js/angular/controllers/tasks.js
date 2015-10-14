// Task Controller for per task isolated scoping
window.angular.module('promotersApp').controller('TaskController', ['$scope', '$rootScope', '$state', '$modal', '$log', '$upload', 'eventsService', function ($scope, $rootScope, $state, $modal, $log, $upload, eventsService) {

    'use strict';

    var _ = window._;

    $scope.itask              = undefined;
    $scope.ifiles             = undefined;
    $scope.comment            = "";
    $scope.completion_status  = true;
    $scope.active_status      = true;

    $scope.progressPercentage = 0;
    $scope.uploadsComplete    = true;
    $scope.s3                 = { policy: "", signature: "" };

    $scope.datepicker_open    = false;

    $scope.$watch('ufiles', function () {
        $scope.upload($scope.ufiles);
    });

    // files
    $scope.downloadFile = function(fileID) {

        $.ajax({
            url: '/taskfiles/' + fileID + '/url',
            method: 'GET',

            success : function(response) {

                console.log(response);

                    var downloadURL = function downloadURL(response) {
                        var hiddenIFrameID = 'hiddenDownloader',
                            iframe = document.getElementById(hiddenIFrameID);
                        if (iframe === null) {
                            iframe = document.createElement('iframe');
                            iframe.id = hiddenIFrameID;
                            iframe.style.display = 'none';
                            document.body.appendChild(iframe);
                        }

                        iframe.src = response;
                    };

                    var download = new downloadURL(response);
            }
        });
    };

    $scope.renameFile = function(file) {

        var curr_timestamp = new Date().getTime();
        var curr_day       = new Date().getDate();
        var random_str     = Math.random().toString(36).substr(8);

        return curr_day+'-'+random_str+'-'+file.name;
    };

    $scope.upload = function(files)
    {
        //$log.log('lll', $scope.s3policy, $scope.s3signature);
        if (files && files.length)
        {
            $('#task_'+$scope.itask.info.id+' .taskfile_progress').show();

            $scope.uploadsComplete = false;
            for (var i = 0; i < files.length; i++)
            {
                $scope.progressPercentage = 0;

                var file          = files[i];
                var new_file_name = $scope.renameFile(file);

                // use me
                var dir_prefix = 'events/'+$scope.itask.info.events_id;
                $log.log('file', file);

                $upload.upload({
                    url: "https://alda-promoters.s3-eu-west-1.amazonaws.com/",  //S3 upload url including bucket name
                    method: 'POST',
                    fields : {
                        key: 'files/'+dir_prefix+'/'+new_file_name,             // the key to store the file on S3, could be file name or customized
                        AWSAccessKeyId: "AKIAJ5YGKDS3CH3BT2MA",
                        acl: 'public-read',                                     // sets the access to the uploaded file in the bucket: private or public
                        success_action_status: "201",
                        policy: $scope.s3.policy,                               // base64-encoded json policy (see article below)
                        signature: $scope.s3.signature,                         // base64-encoded signature based on policy string (see article below)
                        "Content-Type": file.type !== '' ? file.type : "application/octet-stream", // content type of the file (NotEmpty)
                        name: new_file_name,
                        Filename: 'files/'+dir_prefix+'/'+new_file_name,        // this is needed for Flash polyfill IE8-9
                    },
                    file: file

                }).progress(function (evt) {

                    $scope.progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    $('#task_'+$scope.itask.info.id+' .progress-bar').width($scope.progressPercentage+'%');

                    var selector = '#task_'+$scope.itask.info.id;
                    var prog_selector = '#task_'+$scope.itask.info.id+' .progress-bar';

                    $log.log('progress: ' + $scope.progressPercentage + '% ' + evt.config.file.name, selector, prog_selector, $(selector).length, $(prog_selector).length);

                }).success(function (data, status, headers, config) {

                    // resolve promise and get all the things
                    eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/s3upload', {path: new_file_name, original_name: file.name}).then(function() {

                        $log.log("File uploaded...");
                        $scope.getTask($scope.itask.info.id);
                        $scope.progressPercentage = 0;
                        $scope.uploadsComplete = true;
                        $('#task_'+$scope.itask.info.id+' .progress-bar').width(0);
                        $('#task_'+$scope.itask.info.id+' .taskfile_progress').hide();
                    });

                    $log.log('file ' + config.file.name + 'uploaded. Response: ' + data);
                });
            }
        }
    };

    $scope.getProgressWidth = function() {

        return "{width: (progressPercentage * 100)%}";
    };

    $scope.deleteFile = function(file, task_id) {

        eventsService.postServerData('/taskfiles/'+file.id+'/delete').then(function(data) {
            $scope.getTask(task_id);
        });
    };

    // tasks
    $scope.setItask = function(task) {

        //$log.log(task);
        $scope.itask   = task;
        $scope.comment = $scope.itask.info.comment;
        $scope.ifiles  = $scope.itask.files;
    };

    $scope.getTask = function(task_id) {

        $('.backdrop').css('display', 'block');
        eventsService.getServerData('/api/v1/my-events/tasks/'+task_id).then(function(response) {

            $log.log('getTask', response, task_id);

            // get the item in the array
            var new_selected = _.filter($rootScope.promoter_events[$rootScope.event_ndx].tasks, function(item){
                if (item.info.id === task_id) {
                    return item;
                }
            });

            if(new_selected.length) {

                // get the index
                var task_ndx = _.indexOf($rootScope.promoter_events[$rootScope.event_ndx].tasks, new_selected[0]);
                // inject the task files in the global object
                $rootScope.promoter_events[$rootScope.event_ndx].tasks[task_ndx].files = response[0].files;
                $rootScope.promoter_events[$rootScope.event_ndx].tasks[task_ndx].info  = response[0].info;

                $log.log('task ndx found at: '+task_ndx);

                // same for cats
                var task_cat = new_selected[0].info.group_id;
                var cat_tasks;

                // same for cats
                var new_cat_selected = _.filter($rootScope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat], function(item){
                    if (item.info.id === task_id) {
                        return item;
                    }
                });

                var task_cat_ndx = _.indexOf($rootScope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat], new_cat_selected[0]);
                $log.log('task cat_ndx found at: '+task_cat_ndx, new_cat_selected[0]);

                if (task_cat_ndx !== -1) {
                    $rootScope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat][task_cat_ndx].files = response[0].files;
                    $rootScope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat][task_cat_ndx].info  = response[0].info;
                }

            } else {

                $log.log('ERROR: task ndx NOT FOUND');

            }

            // find task in global storage
            $scope.itask   = response[0];
            $scope.comment = $scope.itask.info.comment;
            $scope.ifiles  = $scope.itask.files;

            $('.backdrop').css('display', 'none');
        });
    };

    // comments
    $scope.saveComment = function() {

        eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/comment', {comment_content: $scope.comment}).then(function(response) {

            $log.log('saveCommentresponse', response);
            $scope.getTask($scope.itask.info.id);
        });
    };

    $scope.setActive = function($event) {

        $event.stopPropagation();
        eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/active', {active_status: $scope.active_status}).then(function(response) {

            $log.log('setActive response', response);

            $scope.getTask($scope.itask.info.id);
        });
    };

    $scope.setStatus = function($event) {

        $event.stopPropagation();
        eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/status', {task_status: $scope.completion_status}).then(function(response) {

            $log.log('setStatus response', response);

            //$scope.getTask($scope.itask.info.id);
            $rootScope.initData();
        });
    };

    // hide show task details
    $scope.toggleDetails = function(task) {

        if ($scope.datepicker_open){
            return false;
        }

        var $selected_row   = $('#task_'+task.info.id);
        var $entry_details  = $selected_row.closest('.entry_container').find('.entry_details');
        var details_display = $entry_details.css('display');
        if(details_display === 'none')
        {
            $('body').find('.entry_details').slideUp();
            $('body').find('.entry').css('color', '#555');
            $selected_row.css('color', '#000');
            $entry_details.slideDown();
        }
        else
        {
            $entry_details.slideUp();
        }
    };

    $scope.getTaskOpacity = function(status) {

        return (status === 'complete' ? {opacity: 0.4} : {opacity: 1});
    };

    $scope.catName = function(cat_id) {

        var ret = _.findWhere($rootScope.cats, {id: cat_id});
        return ret ? ret.name : '';
    };

    $scope.getBadgeCSS = function(logged, updated) {

        // return css class for coloring
        //$log.log('getBadgeCSS', logged, updated);
        if(logged === updated) {
            return "same_user";
        }

        return "diff_user";
    };

    $scope.getDeadlineClass = function(due_date) {

        var days_left = $scope.daysLeft(due_date);

        var urgency_class = "urgency_green";
        if(days_left < 15)
        {
            urgency_class = "urgency_red";
        }
        else if(days_left < 20)
        {
            urgency_class = "urgency_yellow";
        }

        return urgency_class;
    };

    // FIXME
    $scope.selectDate = function(date_txt) {

        $log.log('selected date', $scope.dt);
        var parsed_date, parsed_date_str;

        if(date_txt) {
            parsed_date_str = date_txt;
        } else {
            parsed_date = new Date($scope.dt);
            parsed_date_str = parsed_date.getFullYear()+'-'+(parsed_date.getMonth()+1)+'-'+parsed_date.getDate();
        }

        // resolve promise and get all the things
        eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/due_date', {selected_date: parsed_date_str}).then(function() {
            $log.log("Task deadline set...", $scope.dt);
            $rootScope.initData();
        });
    };

    // FIXME
    $scope.convertDate = function(date_val) {

        var exploded_date = date_val.split('-');
        var ret = exploded_date[2]+'-'+exploded_date[1]+'-'+exploded_date[0];

        return ret;
    };


}]);

