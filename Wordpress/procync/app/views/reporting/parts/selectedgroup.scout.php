<script type="text/ng-template" id="selectedgroup.html">

	<div class="selectedgroup" data-evaluation="{{$evaluation}}">

        <div class="reporting-header">

            <div class="row relation-title">
                <div class="col-xs-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 no-padding"><img src="{{$company_logo}}" alt="" style="height:70px;width:auto;margin-top:-5px" class="no-padding">  TOP LINE EVALUATION SUMMARY <span class="breadcrumb-value">@{{ reporting.selected.step }}</span></div>
                            <div class="col-xs-4 text-right period-select">
                                <span>CURRENT PERIOD</span>
                                <div class="switch">
                                    <input id="period-select-switch" type="checkbox" class="cmn-toggle cmn-toggle-round"
                                        ng-model="reporting.selected.periodSpan.selectedgroup"
                                        ng-change="toggleIndexes(setupSelectedGroupGraph);"
                                        ng-init="reporting.selected.evaluationEnd = reporting.selected.evaluationEnd; reporting.selected.evaluationStart = reporting.selected.evaluationStart"
                                        ng-disabled="reporting.selected.allData.length < 2">
                                    <label for="period-select-switch"></label>
                                </div>
                                <span>PREVIOUS PERIOD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row breadcrumb-bar">
                <div class="col-xs-12">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table">
                            <tr>
                                <td class="breadcrumb-label">Client <span class="breadcrumb-value">@{{ reporting.selected.relation.company.name }}</td>
                                <td class="breadcrumb-label">Agency <span class="breadcrumb-value">@{{ reporting.selected.relation.agency.name }}</span></td>
                                <td class="breadcrumb-label">Brand <span class="breadcrumb-value">@{{ reporting.selected.relation.brand.name }}</span></td>
                                <td class="breadcrumb-label">Country <span class="breadcrumb-value">@{{ reporting.selected.relation.country }}</span></td>
                                <td class="breadcrumb-label">Period <span class="breadcrumb-value">@{{ reporting.selected.evaluationStart.period.year +' - Q'+ reporting.selected.evaluationStart.period.quarter }}</span></td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">

            <div class="row top-gap-xs">
                <div class="col-sm-6 text-left">
                    <div class="large-title" ng-bind="reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['name']"></div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="row">
                        <div class="col-xs-3 benchmark-label text-right"><div class="hc-label operations"></div> Operational</div>
                        <div class="col-xs-3 benchmark-label text-right"><div class="hc-label operational-manager"></div> Operational Management</div>
                        <div class="col-xs-3 benchmark-label text-right"><div class="hc-label top-manager"></div> Top Management</div>
                        <div class="col-xs-3 benchmark-label text-right"><div class="hc-label overall-avg"></div> Overall</div>
                    </div>
                </div>
            </div>

            <div class="row top-gap-sm">
                <table class="table" id="selected-group-table">
                    <tbody>
                        <tr>
                            <td width="16.66667%" style="border-top:none;"></td>
                            <td width="83.33334%" class="no-padding" style="border-top:none;">
                                <chart config="reporting.selected.plotOptions.selectedGroup" class="hc-selectedgroup"></chart>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <table class="table table-striped table-condensed" id="dasboard-category-table">
                    <tbody>
                        <tr>
                            <td width="16.66667%"><div class="col-sm-12 info-label">Client vs benchmark</div></td>
                            <td width="@{{ (83.33/reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['questions'].length)+'%'}}" ng-repeat="question in reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['questions']" class="text-center">
                                <div ng-class="getIconClass(getQClientvsBenchmark(question))"></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="16.66667%"><div class="col-sm-12 info-label">Client vs Agency</div></td>
                            <td width="@{{ (83.33/reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['questions'].length)+'%'}}" ng-repeat="question in reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['questions']" class="text-center">
                                <div ng-class="getIconClass(getQClientvsAgencyBenchmark(question))"></div>
                            </td>
                        </tr>
                        <tr>
                            <td width="16.66667%"><div class="col-sm-12 info-label">Overall</div></td>
                            <td width="@{{ (83.33/reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['questions'].length)+'%'}}" ng-repeat="question in reporting.selected.surveyGroups['OP'][reporting.selected.singleGroup]['questions']" class="text-center">
                                <div ng-class="getIconClass(getQOverallBenchmark(question))"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="benchmark-labels">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="row">
                            <div class="col-xs-4 benchmark-label text-right"><span class="performance-icon icon-good"></span> Good</div>
                            <div class="col-xs-4 benchmark-label text-right"><span class="performance-icon icon-improvements-needed"></span> Improve</div>
                            <div class="col-xs-4 benchmark-label text-right"><span class="performance-icon icon-immediate-action"></span> Action</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</script>
