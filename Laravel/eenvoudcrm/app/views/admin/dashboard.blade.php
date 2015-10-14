@extends('admin.layouts.default')


{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

    <div class="page-header row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="#" class="btn btn-default pull-right fetch-roadmap">Fetch Roadmap Entries</a>
        </div>
    </div>

    {{ Form::open(array('action' => 'AdminDashboardController@postCreate', 'class' => 'form form-inline dashboard_form')) }}
    @if($errors->has())

    We encountered the following errors:

    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>

    @endif

    <div class="row">
        <div class="col-xs-12">

            <!-- date -->
            {{-- Form::label('date', 'Date') --}}
            {{ Form::hidden('date', Input::old('date') ? Input::old('date') : date('Y-m-d'), ['class'=>'form-control']) }}
            {{ Form::hidden('user_id', Auth::user()->id, ['class'=>'form-control']) }}
            {{ Form::hidden('project_id', null, ['class'=>'form-control']) }}
            {{ Form::hidden('company_id', null, ['class'=>'form-control']) }}

            <!-- project -->
            <div class="form-group col-xs-2">
                {{ Form::label('project', 'Project', ['class'=>'sr-only']) }}
                {{ Form::text('project',null,['class'=>'form-control typeahead', 'tabindex'=>1, 'placeholder'=>'Project', 'data-prefetch-url'=>'/projects', 'data-template-id'=>'typeahead-template-project']) }}
                @if ($errors->has('project')) <p class="help-block">{{ $errors->first('project') }}</p> @endif
            </div>

            <!-- minutes -->
            <div class="form-group col-xs-1">
                {{ Form::label('minutes', 'Minutes', ['class'=>'sr-only']) }}
                {{ Form::text('minutes', Input::old('minutes'), ['class'=>'form-control', 'tabindex' => 3, 'placeholder' => 'Minutes']) }}
                @if ($errors->has('minutes')) <p class="help-block">{{ $errors->first('minutes') }}</p> @endif
            </div>

            <!-- description -->
            <div class="form-group col-xs-7">
                {{ Form::label('description', 'Description', ['class'=>'sr-only']) }}
                {{ Form::text('description',Input::old('description'),['class'=>'form-control', 'tabindex' => 4, 'placeholder' => 'Description']) }}
                @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
            </div>

            <!-- billable -->
            <div class="form-group checkbox col-xs-1">
                <label>
                     {{ Form::checkbox('billable', 1, false, ['tabindex'=>5]) }}
                </label>Billable
            </div>

            <!-- processed -->
            {{ Form::hidden('processed', 0, ['class'=>'form-control']) }}

            <div class="form-group col-xs-1">
                {{ Form::submit('Save', ['class'=>'btn btn-large btn-primary', 'tabindex'=>6]) }}
            </div>

            {{ Form::close() }}

        </div>
    </div>

    <div class="page-header">
        <h3>Werklogs</h3>
    </div>

    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dashboard_table" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th width="30">Date</th>
                <th width="60">Company</th>
                <th width="80">Project</th>
                <th width="15">Strip</th>
                <th width="15">User</th>
                <th width="10">Min</th>
                <th width="140">Description</th>
                <th width="40">Comment</th>
                <th width="5">B?</th>
                <th width="5">P?</th>
                <th width="60">Actions</th>

            </tr>
        </thead>
    </table>

    <div class="userdump">{{ Auth::user()->id }}</div>

@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/template" id="typeahead-template-project">
    <div><strong><%= datum.value %>(<%= datum.company_id %>)</strong></div>
</script>

<script type="text/template" id="typeahead-template-company">
    <div><strong><%= datum.value %></strong></div>
</script>

@stop
