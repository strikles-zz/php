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

                    {{ Form::open(array('class' => 'form form-horizontal', 'url' => '/search/companies/data', 'autocomplete' => 'off')) }}

                    <div class="form-group">
                        {{ Form::label('companies_name', 'Name', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('companies_name', Input::old('companies_name'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('companies_references', 'References', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('companies_references', Input::old('companies_references'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group typeahead-country">
                        {{ Form::label('companies_country', 'Country', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('companies_country', null, ['class'=>'form-control typeahead', 'data-role'=>'tagsinput', 'data-prefetch-url'=>'/countries', 'data-template-id'=>'typeahead-template-country']) }}
                        </div>
                    </div>

                    <div class="form-group typeahead-city">
                        {{ Form::label('companies_city', 'City', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('companies_city', null, ['class'=>'form-control typeahead', 'data-role'=>'tagsinput', 'data-prefetch-url'=>'/cities', 'data-template-id'=>'typeahead-template-city']) }}
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
                    <table cellpadding="0" cellspacing="0" border="0" class="display table-striped" id="search_companies_table" width="100%">
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

    </div><!-- .row -->

     <!-- Show details view -->
    <div class="row">
        <div class="col-sm-12">
            <div class="details">

            </div>
        </div>
    </div><!-- .row -->


</div>
