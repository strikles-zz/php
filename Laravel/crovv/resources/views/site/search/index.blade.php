@extends('app')

@section('header')
    <div class="home-header">


            <!-- groups title -->
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1"><span class="glyphicon glyphicon-circle-arrow-left"></span> Groups</div>
            </div>

            <!-- image + everything else -->
            <div class="row search-header">

                <!-- user image -->
                <div class="col-sm-3 col-sm-offset-1 hidden-xs">
                    {!! Html::image(\Auth::user()->getPhotoPath(), \Auth::user()->name, array('class' => 'img-responsive img-circle user-logo')) !!}
                </div>

                <!-- search -->
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-1 header-center">
                    <div class="row">

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

            </div>

    </div>
@endsection

@section('content')
    <div class="content container search-results">

    <div class="row"><div class="col-xs-10 col-xs-offset-1">

        {!! Form::open() !!}

        <div class="row">

            <!-- filters -->
            <div class="col-md-3 hidden-xs hidden-sm">

                <!-- filters header-->
                <div class="row top-gap header-label">
                    <div class="col-xs-12">Filters</div>
                </div>

                <div class="row top-gap">
                    <div class="col-xs-12 search-filters">

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
            </div>

            <!-- contacts -->
            <div class="col-md-8 col-md-offset-1 col-lg-6 col-lg-offset-1">

                <!-- contacts -->
                <div class="row top-gap">
                    <div class="col-xs-8 no-padding header-label">Contacts <span class="count">{!! '('.count($users).')' !!}</span></div>
                    <div class="col-xs-4 no-padding">
                        <a href="" class="pull-right see-all">See all &#xbb;</a>
                    </div>
                </div>

                <div class="row top-gap">
                    <div class="col-xs-12 users-list">
                        @foreach($users as $cuser)
                        <div class="row user-entry">
                            <div class="col-xs-2 no-padding">{!! Html::image($cuser->getPhotoPath(), 'home', array('class' => 'img-responsive img-circle')) !!}</div>
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-xs-12 user-name">{!! $cuser->last_name.', '.$cuser->first_name !!}</div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 user-info">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 groups-list">

                        <div class="row top-gap">
                            <div class="col-xs-8 header-label no-padding">Groups <span class="count">{!! '('.count($groups).')' !!}</span></div>
                            <div class="col-xs-4 no-padding">
                                <a href="" class="pull-right see-all">See all &#xbb;</a>
                            </div>
                        </div>

                        <div class="row top-gap">

                            <div class="col-xs-6 search-groups-left">
                            @for($left_ndx = 0; $left_ndx < count($groups); $left_ndx+=2)
                                <div class="group-entry-container">
                                    <div class="row group-entry">
                                        <a href={!! url('/groups/'.$groups[$left_ndx]->id.'/details') !!} style="display:block; position: absolute; top: 0; right: 0; bottom: 0; left: 0; z-index:1000;"></a>
                                        <!-- photo -->
                                        <div class="col-xs-3 no-padding">
                                            {!! Html::image($groups[$left_ndx]->getPhotoPath(), 'home', array('class' => 'img-responsive')) !!}
                                        </div>
                                        <div class="col-xs-9">
                                            <!-- name -->
                                            <div class="row dashboard-groups-entry-name">
                                                <div class="col-xs-12">{!! $groups[$left_ndx]->name !!}</div>
                                            </div>
                                            <!-- group cat -->
                                            <div class="row dashboard-groups-entry-cat">
                                                <div class="col-xs-12">Technology</div>
                                            </div>
                                            <div class="row dashboard-groups-entry-details">
                                                <!-- group city -->
                                                <div class="col-xs-8 dashboard-groups-entry-location">{!! $groups[$left_ndx]->city !!}</div>
                                                <!-- group users -->
                                                <div class="col-xs-4 dashboard-groups-entry-users">
                                                    <div class="pull-right">
                                                        <span class="fa fa-user"></span> {!! $groups[$left_ndx]->users()->count() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            </div>

                            <div class="col-xs-6 search-groups-right">

                            @for($right_ndx = 1; $right_ndx < count($groups); $right_ndx+=2)

                                <div class="group-entry-container">

                                    <div class="row group-entry">
                                        <a href={!! url('/groups/'.$groups[$right_ndx]->id.'/details') !!} style="display:block; position: absolute; top: 0; right: 0; bottom: 0; left: 0; z-index:1000;"></a>
                                        <!-- photo -->
                                        <div class="col-xs-3 no-padding">
                                            {!! Html::image($groups[$right_ndx]->getPhotoPath(), 'home', array('class' => 'img-responsive')) !!}
                                        </div>
                                        <div class="col-xs-9">
                                            <!-- name -->
                                            <div class="row dashboard-groups-entry-name">
                                                <div class="col-xs-12">{!! $groups[$right_ndx]->name !!}</div>
                                            </div>
                                            <!-- group cat -->
                                            <div class="row dashboard-groups-entry-cat">
                                                <div class="col-xs-12">Technology</div>
                                            </div>
                                            <div class="row dashboard-groups-entry-details">
                                                <!-- group city -->
                                                <div class="col-xs-8 dashboard-groups-entry-location">{!! $groups[$right_ndx]->city !!}</div>
                                                <!-- group users -->
                                                <div class="col-xs-4 dashboard-groups-entry-users">
                                                    <div class="pull-right">
                                                        <span class="fa fa-user"></span> {!! $groups[$right_ndx]->users()->count() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endfor

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

        {!! Form::close() !!}
    </div></div>
    </div>
@endsection
