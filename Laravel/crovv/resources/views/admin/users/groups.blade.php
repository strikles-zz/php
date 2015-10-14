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
		<div class="col-sm-2">
			<h4 cla>Name:</h4>
		</div>
		<div class="col-sm-10">
			 {!! $user->name !!}
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<h4 cla>Email:</h4>
		</div>
		<div class="col-sm-10">
			 {!! $user->email !!}
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2">
			<h4 cla>Created:</h4>
		</div>
		<div class="col-sm-10">
			 {!! $user->created_at !!}
		</div>
	</div>
</div>

<hr>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="dataTable">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>created_at</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($all_groups as $agroup)
						<tr>
							<td>{!! $agroup->id !!}</td>
							<td>{!! $agroup->name !!}</td>
							<td>{!! $agroup->created_at !!}</td>
							<td class="text-right ">
								@if($user->hasGroup($agroup->id))
								<form method="POST" action={{{ URL::to("/api/users/". $user->id ."/groups/$agroup->id/detach") }}} accept-charset="UTF-8" class="inline-block">
									<!-- <input name="_method" type="hidden" value="ATTACH" id="_method"> -->
									<input name="_token" type="hidden" value={!! Session::getToken() !!} id="_token">
									<button class="btn btn-danger btn-sm btn-delete" type="submit" data-toggle="tooltip" title="" data-original-title="Dettach">
										<i class="fa fa-times"></i>
									</button>
								</form>
								@else
								<form method="POST" action={{{ URL::to("/api/users/".$user->id."/groups/$agroup->id/attach") }}} accept-charset="UTF-8" class="inline-block"">
									<!-- <input name="_method" type="hidden" value="DETACH" id="_method"> -->
									<input name="_token" type="hidden" value={!! Session::getToken() !!} id="_token">
									<button class="btn btn-default btn-sm" type="submit" data-toggle="tooltip" title="" data-original-title="Attach">
										<i class="fa fa-check"></i>
									</button>
								</form>
								@endif
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
