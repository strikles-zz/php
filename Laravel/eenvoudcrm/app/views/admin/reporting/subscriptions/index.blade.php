<table class="table_header">
    <tr class="header_line">
        <td class="header_description">
            <h3>Subscriptions Report</h3>
        </td>
        <td class="col_units">
            <h3>#</h3>
        </td>
        <td class="col_units">
            <h3>&euro;</h3>
        </td>
    </tr>
</table>

<div id="subscriptions_report">
    @foreach ($subscriptions_by_cat as $cat_ndx => $curr_cat_subscriptions)
        @if(count($curr_cat_subscriptions) > 0)
            <table class="servicecat-section">
                <tr>
                    <td class="servicecat-label">
                        <h4>{{{ ServiceCategory::find((int)$cat_ndx)->name }}}</h4>
                    </td>
                    <td class="servicecat-totaloccurrences"></td>
                    <td class="servicecat-totalprice"></td>
                </tr>
                @foreach ($curr_cat_subscriptions as $subscription_ndx => $subscription)
                    <tr class="service-entry">
                    	<td class="service-label">
                    		{{{ $subscription->service->name }}}
                    	</td>
                    	<td class="service-occurrences">
                			{{{ $subscription->service_occurrences }}}
                    	</td>
                        <td class="service-totalprice">
                            {{{ number_format((float)$subscription->service_group_total_price, 2, ',', '') }}}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endforeach
    <hr>
        <table class="totals">
            <tr>
                <td><h4>TOTAL</h4></td>
                <td class="occurrences_total"></td>
                <td class="revenue_total"></td>
            </tr>
        </table>
    <hr>
    <div class="row" style="margin: 20px 0">
        <div class="col-sm-12">
            <div id="subscriptions_report_graph_container" style="width: 600px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
</div>
