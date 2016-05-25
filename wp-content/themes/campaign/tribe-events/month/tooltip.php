<?php

/**
 *
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		<h4 class="entry-title summary">[[=title]]</h4>

		<div class="tribe-events-event-body">
			[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" />
			</div>
			[[ } ]]
			<div class="duration topmargin10">
				<abbr class="tribe-events-abbr published dtstart">[[=startTime]] </abbr>
				[[ if(endTime.length) { ]]
				-<abbr class="tribe-events-abbr dtend"> [[=endTime]]</abbr>
				[[ } ]]
			</div>
			[[ if(excerpt.length) { ]]
			<div class="topmargin10">
			<p class="entry-summary description">[[=raw excerpt]]</p>
			</div>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>