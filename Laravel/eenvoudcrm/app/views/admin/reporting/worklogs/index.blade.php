<table class="table_header">
    <tr class="header_line">
        <td class="header_description">
            <h3>Worklogs Report</h3>
        </td>
        <td class="col_units">
            <h3>#</h3>
        </td>
        <td class="col_units">
            <h3>min</h3>
        </td>
    </tr>
</table>

<div id="worklogs_report">
    @foreach ($worklogs_by_proj as $proj_ndx => $curr_proj_worklogs)
    	@if(count($curr_proj_worklogs) > 0)
    		<table class="project-section">
				<tr>
					<td class="project-label">
						<h4>{{{ Project::find((int)$proj_ndx)->name }}}</h4>
					</td>
                    <td class="project-totaloccurrences"></td>
                    <td class="project-totalminutes"></td>
				</tr>
		    	@foreach ($curr_proj_worklogs as $worklog_ndx => $worklog)
			    	@if(isset($worklog->user))
					    <tr class="worklog-entry">
					    	<td class="user-label">
					    		{{{ $worklog->user->username }}}
					    	</td>
					    	<td class="user-occurrences">
								{{{ $worklog->user_occurrences }}}
					    	</td>
					    	<td class="user-totaltime">
								{{{ number_format((float)$worklog->user_project_total_time, 0, ',', '') }}}
					    	</td>
					    </tr>
					@endif
				@endforeach
			</table>
		@endif
    @endforeach
    <hr>
        <table class="totals">
            <tr>
                <td><h4>TOTAL</h4></td>
                <td class="worklogs_total"></td>
                <td class="minutes_total"></td>
            </tr>
        </table>
    <hr>

	<div class="row" style="margin: 20px 0">
		<div class="col-sm-12">
			<div id="worklogs_report_graph_container" style="width: 600px; height: 400px; margin: 0 auto"></div>
		</div>
	</div>
</div>
