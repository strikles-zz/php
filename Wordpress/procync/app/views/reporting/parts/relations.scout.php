<script type="text/ng-template" id="relations.html">

    <div class="relations-selection top-gap-lg" data-evaluation="{{$evaluation}}">

        <div class="row intro-logo">
            <div class="col-xs-12 text-center">
                <img src="/content/themes/procync/app/assets/images/logo.png" alt="Procync">
            </div>
        </div>

        <div class="row top-gap-md" ng-hide="reporting.fetchingData">

            <div class="col-sm-4 col-sm-offset-4 col-lg-4 col-lg-offset-4  text-center">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <select class="form-control relations" ng-model="reporting.selected.relation" ng-options="relation.name for relation in reporting.relations track by relation.id" ng-hide="reporting.relations.length === 1" ng-change="reporting.selected.step = reporting.selected.relation.steps[0]"></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <select class="form-control steps" ng-model="reporting.selected.step" ng-options="step for step in reporting.selected.relation.steps" ng-hide="reporting.selected.relation.steps.length < 2 || !reporting.selected.relation"></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button class="relations-submit" ng-click="fetchRelationData(setLocation('dashboard'));">Select <img src="/content/themes/procync/app/assets/images/next-blue.png" alt="Next"></button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</script>
