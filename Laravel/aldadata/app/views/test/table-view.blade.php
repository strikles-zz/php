@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site.contact_us') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
	<table class="table">
		<thead>
			<th>Type</th>
			<th>Description</th>
			<th>Due</th>
			<th>Remaining</th>
			<th>Status</th>
		</thead>

		<tbody>
			<tr>
			<td>Tour Management</td>
			<td>Venue lay-out dancefloor area</td>
			<td>1-2-2015</td>
			<td>1 days</td>
			<td>open</td>
			</tr>

			<tr>
			<td>Tour Management</td>
			<td>Venue lay-out dancefloor area</td>
			<td>1-2-2015</td>
			<td>1 days</td>
			<td>open</td>
			</tr>

			<tr>
			<td colspan="5">
				<div style="position: absolute; left:0; right:0; background:#555;">
					<div class="container">
						<div class="row">
							<div class="col-sm-8">
								<table class="table container-fluid" style="background:#555;">
									<thead>
										<th>Date</th>
										<th>User</th>
										<th>Filename</th>
										<th>Actions</th>
									</thead>
								</table>
							</div>
							<div class="col-sm-4">
								<table class="table container-fluid" style="background:#555;">
									<thead>
										<th>Comments</th>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</td>
			</tr>

		</tbody>
	</table>


@stop