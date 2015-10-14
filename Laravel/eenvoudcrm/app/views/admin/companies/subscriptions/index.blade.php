<div class="tabbable subscriptions-container container">

    <ul id="renewals-tablist" class="nav nav-tabs">
        <li class="active subscriptions-inner"><a href="#subscriptions_all">Subscriptions</a></li>
        <li class="renewals-inner"><a href="#subscriptions_renewals">Renewals</a></li>
        <li class="nieuwsbrieven-inner"><a href="#subscriptions_nieuwsbrieven" role="tab" data-toggle="tab">Nieuwsbriefen</a></li>
    </ul>

    <div id="companySubscriptionsTabContent" class="tab-content">

        <div class="tab-pane fade active in" id="subscriptions_all">
            @include('admin.companies.subscriptions.all.index')
        </div>
        <div class="tab-pane fade" id="subscriptions_renewals">
            @include('admin.companies.subscriptions.renewals.index')
        </div>
        <div class="tab-pane fade" id="subscriptions_nieuwsbrieven">
            @include('admin.subscriptions.nieuwsbrieven.index')
        </div>
    </div>

</div>

