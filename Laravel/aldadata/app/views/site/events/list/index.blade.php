<table class="table table-condensed">
	@foreach ($events as $event)
		@include ('site/events/list/single', $event)
	@endforeach
</table>
<script>
(function($) {
	$('.rating').rating({
		starCaptions: {
			1: 'Half Star',
		    2: 'One Star',
		    3: 'One & Half Star',
		    4: 'Two Stars',
		    5: 'Two & Half Stars',
		    6: 'Three Stars',
		    7: 'Three & Half Stars',
		    8: 'Four Stars',
		    9: 'Four & Half Stars',
		    10: 'Five Stars'
		}
	});

})(jQuery);</script>