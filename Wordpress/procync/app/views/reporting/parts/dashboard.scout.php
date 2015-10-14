<script type="text/ng-template" id="dashboard.html">

<div class="dashboard" data-evaluation="{{$evaluation}}">

    <div class="selected-relation">

        <div class="reporting-header">

            <div class="row relation-title">
                <div class="col-xs-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8 no-padding"><img src="{{$company_logo}}" alt=""/ style="height: 70px; width:auto; margin-top: -5px">  TOP LINE EVALUATION SUMMARY <span class="breadcrumb-value">@{{ reporting.selected.step }}</span></div>
                            <div class="col-xs-4 text-right period-select">
                                <span>CURRENT PERIOD</span>
                                <div class="switch">
                                    <input id="period-select-switch" type="checkbox" class="cmn-toggle cmn-toggle-round"
                                        ng-model="reporting.selected.periodSpan.dashboard"
                                        ng-change="toggleIndexes(setupGraphData);"
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

            <h2 ng-show="!reporting.fetchingData && !reporting.selected.referenceEval" class="text-center">No Data</h2>
            <div class="main-content top-gap-sm" ng-hide="reporting.fetchingData || reporting.selected.allData.length === 0">

                <div class="row">
                    <div class="col-sm-6 hc-container">
                        <div class="row">
                            <div class="col-sm-12 text-left large-title">OVERALL SCORE &gt;</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <chart config="reporting.selected.plotOptions.dashboard.core_sujects" class="hc-dashboard overall"></chart>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 hc-container">
                        <div class="row">
                            <div class="col-sm-12 text-left large-title">NET PARTNERSHIP SCORE &gt;</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <chart config="reporting.selected.plotOptions.dashboard.participants" class="hc-dashboard"></chart>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row top-gap-sm" id="dashboard-category-container">
                    <div class="col-sm-12">
                        <div class="large-title">CORE SUBJECTS &gt;</div>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-condensed" id="dasboard-category-table">
                        <tbody>
                            <tr>
                                <td width="16.66667%">
                                    <div class="hc-label-wrap client"><span class="hc-label client"></span> Client</div>
                                    <div class="hc-label-wrap agency"><span class="hc-label agency"></span> Agency</div>
                                    <div class="hc-label-wrap benchmark"><span class="hc-label benchmark"></span> Benchmark</div>
                                </td>
                                <td ng-class="getColumnsClass()" ng-repeat="group in reporting.selected.surveyGroups['OP']" class="text-center">
                                    <chart config="reporting.selected.plotOptions.dashboard.singleGroup[group.gid]" class="hc-dashboard"></chart>
                                </td>
                            </tr>

                            <tr>
                                <td width="16.66667%"><div class="col-sm-12 info-label">&nbsp;</div></td>
                                <td ng-class="getColumnsClass()" ng-repeat="group in reporting.selected.surveyGroups['OP']" class="text-center">
                                    <div class="group-label text-center" ng-click="reporting.selected.singleGroup=group.gid;setupSelectedGroupGraph();setLocation('selectedgroup/'+group.gid);">@{{group.name}}</div>
                                </td>
                            </tr>

                            <tr class="border-top">
                                <td width="16.66667%"><div class="col-sm-12 info-label">Client vs benchmark</div></td>
                                <td ng-class="getColumnsClass()" ng-repeat="group in reporting.selected.surveyGroups['OP']" class="text-center">
                                    <div ng-class="getIconClass(getClientvsBenchmark(group.gid))" data-score="@{{getClientvsBenchmark(group.gid)}}"></div>
                                </td>
                            </tr>
                            <tr class="border-top">
                                <td><div class="col-sm-12 info-label">Client vs Agency</div></td>
                                <td ng-class="getColumnsClass()" ng-repeat="group in reporting.selected.surveyGroups['OP']" class="text-center">
                                    <div ng-class="getIconClass(getClientvsAgencyBenchmark(group.gid))" data-score="@{{getClientvsAgencyBenchmark(group.gid)}}"></div>
                                </td>
                            </tr>
                            <tr class="border-top">
                                <td><div class="col-sm-12 info-label">Overall</div></td>
                                <td ng-class="getColumnsClass()" ng-repeat="group in reporting.selected.surveyGroups['OP']" class="text-center">
                                    <div ng-class="getIconClass(getOverallBenchmark(group.gid))" data-score="@{{getOverallBenchmark(group.gid)}}"></div>
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

    </div>

</div>
</script>
