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

                    {{ Form::open(array('class' => 'form form-horizontal', 'url' => '/search/contacts/data', 'autocomplete' => 'off')) }}

                    <div class="form-group">
                        {{ Form::label('contacts_first_name', 'First Name', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('contacts_first_name', Input::old('contacts_first_name'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('contacts_last_name', 'Last Name', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('contacts_last_name', Input::old('contacts_last_name'), ['class'=>'form-control']) }}
                        </div>
                    </div>


                    <div class="form-group">
                        {{ Form::label('contacts_function', 'Function', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('contacts_function', Input::old('contacts_function'), ['class'=>'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group typeahead-country">
                        {{ Form::label('contacts_country', 'Country', array('class' => 'col-sm-4 control-label')) }}
                        <div class="col-sm-8">
                            {{ Form::text('contacts_country', Input::old('contacts_country'), ['class'=>'form-control typeahead', 'data-role'=>'tagsinput', 'data-prefetch-url'=>'/countries', 'data-template-id'=>'typeahead-template-country']) }}
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
                    <table cellpadding="0" cellspacing="0" border="0" class="display table-striped" id="search_contacts_table" width="100%">
                        <thead>
                            <tr>
                                <th data-column="first_name">First Name</th>
                                <th data-column="last_name">Last Name</th>
                                <th data-column="function">Function</th>
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
