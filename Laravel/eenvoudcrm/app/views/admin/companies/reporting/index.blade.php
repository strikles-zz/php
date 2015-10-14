
<div class="container" id="reporting-container">

    <div class="bs-example bs-example-tabs">

        <ul id="renewals-tablist" class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#reporting_subscriptions" role="tab" data-toggle="tab">Subscriptions</a></li>
            <li class=""><a href="#reporting_worklogs" role="tab" data-toggle="tab">Worklogs</a></li>
        </ul>

        <div id="reportingTabContent" class="tab-content">

            <div class="tab-pane fade active in" id="reporting_subscriptions">
                @include('admin.companies.reporting.subscriptions.index')
            </div>
            <div class="tab-pane fade" id="reporting_worklogs">
                @include('admin.companies.reporting.worklogs.index')
            </div>
        </div>

    </div>
</div>
