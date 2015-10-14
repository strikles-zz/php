<div class="container">

    <div class="row">

        <!-- Search Form -->
        <div class="col-sm-4">

            <div class="row">
                <div class="col-sm-12">
                    <h4>Search Criteria</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">

                    {{ Form::open(array('class' => 'form-horizontal', 'url' => '/search/venues/data', 'autocomplete' => 'off')) }}

                    <div class="form-group">
                        {{ Form::label('venues_name', 'Name', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('venues_name', Input::old('venues_name'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group typeahead-country">
                        {{ Form::label('venues_country', 'Country', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('venues_country', Input::old('venues_country'), ['class'=> 'form-control typeahead', 'data-role'=>'tagsinput', 'data-prefetch-url'=>'/countries', 'data-template-id'=>'typeahead-template-country']) }}
                        </div>
                    </div>

                    <div class="form-group typeahead-city">
                        {{ Form::label('venues_city', 'City', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('venues_city', Input::old('venues_city'), ['class'=> 'form-control typeahead', 'data-role'=>'tagsinput', 'data-prefetch-url'=>'/cities', 'data-template-id'=>'typeahead-template-city']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('venues_min_capacity', 'Min Capacity', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('venues_min_capacity', Input::old('venues_min_capacity'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('venues_max_capacity', 'Max Capacity', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('venues_max_capacity', Input::old('venues_max_capacity'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('venues_min_rig_capacity', 'Min Rig Capacity', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('venues_min_rig_capacity', Input::old('venues_min_rig_capacity'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>

        </div>

        <!-- Datatable -->
        <div class="col-sm-8">

            <div class="row">
                <div class="col-sm-12">
                    <h4>Search Results</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table-striped" id="search_venues_table" width="100%">
                        <thead>
                            <tr>
                                <th data-column="name">Name</th>
                                <th data-column="city">City</th>
                                <th data-column="country">Country</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <!-- Show details view -->
    <div class="row">
    	<div class="col-sm-12">
    		<div class="details">

    		</div>
    	</div>
    </div><!-- .row -->
</div>
