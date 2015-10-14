window.angular.module('promotersApp').directive("edatepicker", function () {

    'use strict';
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {

            //console.log('attrs', attrs.value);
            var updateModel = function (dateText) {
                scope.$apply(function () {
                    ngModelCtrl.$setViewValue(dateText);
                });
            };

            var options = {
                dateFormat: "dd-mm-yy",
                defaultDate: scope.convertDate(scope.task.info.due_date),
                onSelect: function (dateText) {
                    updateModel(dateText);
                    scope.selectDate(scope.dt);
                },
                onClose: function () {
                    scope.datepicker_open = false;
                }
            };
            elem.datepicker(options);
        }
    };
})

.directive("sdatepicker", function () {

    'use strict';
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {

            //console.log('attrs', attrs.value);
            var updateModel = function (dateText) {
                scope.$apply(function () {
                    ngModelCtrl.$setViewValue(dateText);
                });
            };

            var options = {
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText) {
                    updateModel(dateText);
                    //scope.selectDate(scope.dt);
                },
                onClose: function () {
                    scope.datepicker_open = false;
                }
            };
            elem.datepicker(options);
        }
    };
})

.directive("bdatepicker", function () {

    'use strict';
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {

            //console.log('attrs', attrs.value);
            var updateModel = function (dateText) {
                scope.$apply(function () {
                    ngModelCtrl.$setViewValue(dateText);
                });
            };

            var options = {
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText) {
                    updateModel(dateText);
                    //scope.selectDate(scope.dt);
                },
                onClose: function () {
                    scope.datepicker_open = false;
                }
            };
            elem.datepicker(options);
        }
    };
})

.directive('datepickerPopup', function (dateFilter, datepickerPopupConfig) {

    'use strict';
    return {
        restrict: 'A',
        priority: 1,
        require: 'ngModel',
        link: function(scope, element, attr, ngModel) {
            var dateFormat = attr.datepickerPopup || datepickerPopupConfig.datepickerPopup;
            ngModel.$formatters.push(function (value) {
                return dateFilter(value, dateFormat);
            });
        }
    };
})

.directive("timeFormat", function($filter) {

    'use strict';
    var angular = window.angular;

    return {
        restrict : 'A',
        require : 'ngModel',
        scope : {
            showMeridian : '=',
        },
        link : function(scope, element, attrs, ngModel) {

            var parseTime = function(viewValue) {

                if (!viewValue) {
                    ngModel.$setValidity('time', true);
                    return null;
                } else if (angular.isDate(viewValue) && !isNaN(viewValue)) {
                    ngModel.$setValidity('time', true);
                    return viewValue;
                } else if (angular.isString(viewValue)) {
                    var timeRegex = /^(0?[0-9]|1[0-2]):[0-5][0-9] ?[a|p]m$/i;
                    if (!scope.showMeridian) {
                        timeRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
                    }
                    if (!timeRegex.test(viewValue)) {
                        ngModel.$setValidity('time', false);
                        return undefined;
                    } else {
                        ngModel.$setValidity('time', true);
                        var date = new Date();
                        var sp = viewValue.split(":");
                        var apm = sp[1].match(/[a|p]m/i);
                        if (apm) {
                            sp[1] = sp[1].replace(/[a|p]m/i, '');
                            if (apm[0].toLowerCase() === 'pm') {
                                sp[0] = sp[0] + 12;
                            }
                        }
                        date.setHours(sp[0], sp[1]);
                        return date;
                    }
                } else {
                    ngModel.$setValidity('time', false);
                    return undefined;
                }
            };

            ngModel.$parsers.push(parseTime);

            var showTime = function(data) {
                parseTime(data);
                var timeFormat = (!scope.showMeridian) ? "HH:mm" : "hh:mm a";
                return $filter('date')(data, timeFormat);
            };
            ngModel.$formatters.push(showTime);
            scope.$watch('showMeridian', function(value) {
                var myTime = ngModel.$modelValue;
                if (myTime) {
                    element.val(showTime(myTime));
                }

            });
        }
    };
})

.directive('timepickerPop', function($document, timepickerState) {

    'use strict';
    var angular = window.angular;

    return {
        restrict : 'E',
        transclude : false,
        scope : {
            inputTime : "=",
            showMeridian : "=",
            disabled : "="
        },
        controller : function($scope, $element) {

            $scope.isOpen = false;
            $scope.disabledInt = angular.isUndefined($scope.disabled)? false : $scope.disabled;

            $scope.toggle = function() {
                if ($scope.isOpen) {
                    $scope.close();
                } else {
                    $scope.open();
                }
            };
        },
        link : function(scope, element, attrs) {

            var picker = {
                open : function () {
                    timepickerState.closeAll();
                    scope.isOpen = true;
                },
                close: function () {
                    scope.isOpen = false;
                }

            };
            timepickerState.addPicker(picker);

            scope.open = picker.open;
            scope.close = picker.close;

            scope.$watch("disabled", function(value) {
                scope.disabledInt = angular.isUndefined(scope.disabled)? false : scope.disabled;
            });

            scope.$watch("inputTime", function(value) {

                if (!scope.inputTime) {
                    element.addClass('has-error');
                } else {
                    element.removeClass('has-error');
                }

            });

            element.bind('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
            });

            $document.bind('click', function(event) {
                scope.$apply(function() {
                    scope.isOpen = false;
                });
            });

        },
        template : "<input type='text' class='form-control' ng-model='inputTime' ng-disabled='disabledInt' time-format show-meridian='showMeridian' ng-focus='open()' />" +
            "  <div ng-class='{open:isOpen}'> " +
            //"    <button type='button' ng-disabled='disabledInt' style='height:34px;' class='btn btn-default ' ng-class=\"{'btn-primary':isOpen}\" data-toggle='dropdown' ng-click='toggle()'> " +
            //"        <i class='glyphicon glyphicon-time'></i></button> " +
            "          <div class='dropdown-menu pull-right'> " +
            "            <timepicker ng-model='inputTime' show-meridian='showMeridian'></timepicker> " +
            "           </div> " +
            " </div>"
    };
});
