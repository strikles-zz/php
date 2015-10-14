@extends('app')

@section('header')
	<div class="home-header">

		<!-- groups title -->
		<div class="row">
			<div class="col-xs-12"><span class="glyphicon glyphicon-circle-arrow-left"></span> Groups</div>
		</div>

		<!-- image + everything else -->
		<div class="row search-header">

			<!-- group image -->
			<div class="col-sm-2 hidden-xs">
				{!! Html::image($group->getPhotoPath(), $group->name, array('class' => 'group-logo')) !!}
			</div>

			<!-- group next meeting -->
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-1 header-center">
				<div class="row"><div class="col-xs-12">&nbsp;</div></div>
				<div class="row">
					<div class="col-xs-12">
						{!! Form::open(array('url' => '/search')) !!}
						<div class="input-group">
							{!! Form::text('search-term', old('search-term'), array('class'=>'form-control', 'placeholder'=>'')) !!}
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default search-btn"><span class="fa fa-search"></span></button>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">&nbsp;</div>
			</div>

			<!-- group options -->
			<div class="col-sm-2 col-sm-offset-1 hidden-xs"></div>

		</div>

	</div>
@endsection

@section('content')
	<div class="content container group-invitations">

		{!! Form::open() !!}

		<div class="row top-gap">

			<!-- filters -->
			<div class="col-sm-2">

				<div class="row">
					<div class="col-xs-12 header-label">Filters</div>
				</div>

				<div class="search-filters top-gap">

					<!-- location -->
					<div class="row">
						<div class="col-xs-12">

							<div class="row filter-header">
								<div class="col-xs-12">Location</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Netherlands (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Amsterdam (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Utrecht (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Den Haag (12345)</span></input>
								</div>
							</div>

						</div>
					</div>

					<!-- sector -->
					<div class="row top-gap">
						<div class="col-xs-12">

							<div class="row filter-header">
								<div class="col-xs-12">Sector</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> IT and Services (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Finance (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Marketing (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Internet (12345)</span></input>
								</div>
							</div>
							<div class="row filter-entry">
								<div class="col-xs-12 truncate">
									<input type="checkbox"><span> Design (12345)</span></input>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

			<!-- contacts -->
			<div class="col-sm-6 col-sm-offset-1">

				<div class="row">
					<div class="col-xs-12 header-label">
						<div class="row">
							<div class="col-xs-6">Contacts <span class="count">{!! '('.count($users).')' !!}</span></div>
							<div class="col-xs-6">
								{!! Form::submit('Send Invites', array('class'=>'send-invites btn btn-form pull-right')) !!}
							</div>
						</div>
					</div>
				</div>

				<div class="users-list top-gap">
					@foreach($users as $cuser)
					<div class="row user-entry">
						<div class="col-xs-2 no-padding user-img">
							{!! Html::image($cuser->getPhotoPath(), 'home', array('class' => 'img-responsive img-circle')) !!}
						</div>
						<div class="col-xs-9">
							<div class="row">
								<div class="col-xs-12 user-name">
									{!! $cuser->last_name.', '.$cuser->first_name !!}
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 user-info">
									Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo
								</div>
							</div>
						</div>
						<div class="col-xs-1">
							<div class="row">
								<div class="col-xs-12">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-xs-12"><label for="users[]"></label>{!! Form::checkbox('users[]', $cuser->id, null, ['class' => 'faChkRnd']) !!}</div>
							</div>

						</div>
					</div>
					@endforeach
				</div>

			</div>

			<!-- selected -->
			<div class="col-sm-2 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-12 header-label">Selected <span class="count selected-count">(0)</span></div>
				</div>
				<div class="invite-users-selected top-gap"></div>
			</div>

		</div>

		{!! Form::close() !!}

	</div>

	<script id="selectedTemplate" type="text/x-jquery-tmpl">
		<div class="row top-gap selected-entry">
			<div class="col-xs-3 no-padding selected-img">
			</div>
			<div class="col-xs-6 truncate selected-name"></div>
			<div class="col-xs-3">
				<input type="checkbox" class="faChkRnd selected-entry-checkbox" name="users[]">
			</div>
		</div>
	</script>

@endsection
