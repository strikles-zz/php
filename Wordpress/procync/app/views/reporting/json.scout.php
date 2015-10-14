@include('header')

	<div class="content"></div>

	<script>

		'use strict';
		var $ = window.jQuery;
		var allData = undefined;

		var query_str = '/cms/wp-admin/admin-ajax.php?action=getHistoricalResponses';
        $.post(query_str, {relation_id: '535', step: '180'}, function(data, textStatus, xhr) {

        	allData = data;
        	$('.content').html(JSON.stringify(data));
        });

	</script>


@include('footer')