@extends('app')

@section('header')
	<div class="home-header">

		<!-- groups title -->
		<div class="row">
			<div class="col-sm-12"><span class="glyphicon glyphicon-circle-arrow-left"></span> Groups</div>
		</div>

		<!-- image + everything else -->
		<div class="row invitation-header">

			<!-- group image -->
			<div class="col-sm-3">
				{!! Html::image($group->photo, $group->name, array('class' => 'img-responsive group_logo')) !!}
			</div>


			<!-- group next meeting -->
			<div class="col-sm-6 group-invite-header-center">
				<div class="row">&nbsp;</div>
				<div class="row">

					{!! Form::open(array('url' => '/search')) !!}
					<div class="input-group">
						{!! Form::text('search-term', old('search-term'), array('class'=>'form-control', 'placeholder'=>'')) !!}
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Everything <span class="caret"></span></button>
							<ul class="dropdown-menu dropdown-menu-right" role="menu">
								<li>{!! Form::checkbox('filter_function', 1, null, ['class' => 'cb']) !!} <span>Function</span></li>
								<li>{!! Form::checkbox('filter_company', 1, null, ['class' => 'cb']) !!} <span>Company</span></li>
								<li>{!! Form::checkbox('filter_sector', 1, null, ['class' => 'cb']) !!} <span>Sector</span></li>
								<li>{!! Form::checkbox('filter_name', 1, null, ['class' => 'cb']) !!} <span>Name</span></li>
								<li class="divider"></li>
								<li>{!! Form::checkbox('filter_meetings', 1, null, ['class' => 'cb']) !!} <span>Meetings</span></li>
							</ul>
							<button type="submit" class="btn btn-default invitation-search"><span class="fa fa-search"></span></button>
						</div>
					</div>
					{!! Form::close() !!}

				</div>
			</div>

			<!-- group options -->
			<div class="col-sm-3"></div>

		</div>

	</div>
@endsection

@section('content')
	<div class="content container group-invitations">

		{!! Form::open() !!}

		<div class="row top-gap">

			<!-- filters -->
			<div class="col-sm-2 invite-header-label">Filters</div>
			<!-- contacts -->
			<div class="col-sm-8 invite-header-label">
				<div class="col-xs-6">
					Contacts (123)
				</div>
				<div class="col-xs-6">
					{!! Form::submit('Send Invites', array('class'=>'send-invites btn btn-form pull-right')) !!}
				</div>
			</div>
			<!-- selected -->
			<div class="col-sm-2 invite-header-label">Selected (2)</div>

		</div>

		<div class="row top-gap group-invitations-filters">

			<!-- filters -->
			<div class="col-xs-2">

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

			<!-- contacts -->
			<div class="col-xs-8 invite-users-list">

				@foreach(\App\User::all() as $cuser)
				<div class="row user-entry">
					<div class="col-xs-2 no-padding">
						{!! Html::image($cuser->photo, 'home', array('class' => 'img-responsive img-circle')) !!}
					</div>
					<div class="col-xs-8">
						<div class="row">
							<div class="col-xs-12 user-name">
								{!! $cuser->last_name, $cuser->first_name !!}
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 user-info">
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo
							</div>
						</div>
					</div>
					<div class="col-xs-2">
						{!! Form::checkbox('users[]', $cuser->id, null, ['class' => 'faChkRnd']) !!}
					</div>
				</div>
				@endforeach

			</div>

			<!-- selected -->
			<div class="col-xs-2 invite-users-selected">

				<div class="row">
					<div class="col-xs-2 no-padding">
						{!! Html::image('images/ppl/24.png', 'home', array('class' => 'img-responsive img-circle')) !!}
					</div>
					<div class="col-xs-8">Dr. Lovegood</div>
					<div class="col-xs-2">
						<input type="checkbox" class="faChkRnd">
					</div>
				</div>
				<div class="row top-gap">
					<div class="col-xs-2 no-padding">
						{!! Html::image('images/ppl/42.png', 'home', array('class' => 'img-responsive img-circle')) !!}
					</div>
					<div class="col-xs-8">El</div>
					<div class="col-xs-2">
						<input type="checkbox" class="faChkRnd">
					</div>
				</div>

			</div>

		</div>

		{!! Form::close() !!}

	</div>
@endsection
