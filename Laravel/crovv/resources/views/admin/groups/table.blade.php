<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">
			{{{ $title }}}
			@if(isset($subtitle))
				({{{ $subtitle }}})
			@endif
		</h1>
		@if(Session::has('message'))
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{ Session::get('message') }}
			</div>
		@endif
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<a class="btn btn-primary navbar-btn" href={{{ URL::to("admin/groups/create") }}}><i class="fa fa-plus"></i> New Entry</a>
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="dataTable">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>description</th>
							<th>country</th>
							<th>city</th>
							<th>created_at</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($all_groups as $agroup)
						<tr>
							<td>{!! $agroup->id !!}</td>
							<td>{!! $agroup->name !!}</td>
							<td>{!! $agroup->description !!}</td>
							<td>{!! $agroup->country !!}</td>
							<td>{!! $agroup->city !!}</td>
							<td>{!! $agroup->created_at !!}</td>
							<td class="text-right ">
								<a class="btn btn-default btn-sm" href={{{ URL::to("/admin/groups/$agroup->id/update")}}} data-toggle="tooltip" title="" data-original-title="Edit">
									<i class="fa fa-pencil"></i>
								</a>
								<form method="POST" action={{{ URL::to("/admin/groups/$agroup->id/delete")}}} accept-charset="UTF-8" class="inline-block" enctype="multipart/form-data">
									<!-- <input name="_method" type="hidden" value="DELETE" id="_method"> -->
									<input name="_token" type="hidden" value={!! Session::getToken() !!} id="_token">
									<button class="btn btn-danger btn-sm btn-delete" type="submit" data-toggle="tooltip" title="" data-original-title="Delete">
										<i class="fa fa-times"></i>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
