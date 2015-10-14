<div class="tabbable accounting-container container">

    <div class="bs-example bs-example-tabs">

        <ul id="accounting-tablist" class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#accounting_worklogs" role="tab" data-toggle="tab">Worklogs</a></li>
            <li class=""><a href="#accounting_subscriptions" role="tab" data-toggle="tab">Subscriptions</a></li>
        </ul>

        <div id="myTabContent" class="tab-content">

            <div class="tab-pane fade active in" id="accounting_worklogs">
                @include('admin.companies.accounting.worklogs.index')
            </div>
            <div class="tab-pane fade" id="accounting_subscriptions">
                @include('admin.companies.accounting.subscriptions.index')
            </div>

        </div>

    </div>

</div>
