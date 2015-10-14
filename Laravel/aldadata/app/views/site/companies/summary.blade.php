<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? count($model->companies) : '' }}</span> Companies</legend>
    </div>
</div>
@if (isset($model))
    @foreach($model->companies as $company)
        <div class="row">
            <div class="col-sm-5 truncate">{{{ $company->name }}}</div>
            <div class="col-sm-3 truncate">{{{ $company->type }}}</div>
            <div class="col-sm-4">
                <div class="btn-group pull-right">
                    <button type="button"
                        data-action="edit"
                        data-type= "companies"
                        data-parent-type="{{ strtolower(get_class($model)) }}"
                        data-id="{{ $company->id }}"
                        data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                        data-parent-title="{{ isset($model) ? $model->name : '' }}"
                        class="ajax btn btn-xs fa fa-pencil"></button>
                    <button type="button"
                        data-action="{{ URL::to($controller .'/' . $model->id . '/companies/' . $company->id . '/detach' ) }}"
                        class="modal-popup btn btn-xs fa fa-unlink"></button>
                    <button type="button"
                        data-action="{{ URL::to('companies/' . $company->id . '/delete' ) }}"
                        class="modal-popup btn btn-xs btn-delete fa fa-trash"></button>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="row">
    <div class="col-md-12">
        <div class="input-group input-group-sm">
            <input class="typeahead form-control input-sm" type="text"
                data-prefetch-url="/companies"
                data-template-id="typeahead-template-company"
                data-attach-url="{{{ URL::to($controller . '/' . $model->id . '/companies/') }}}"
                placeholder="Name" autocomplete="off">
            <span class="input-group-btn">
                <button type="button"
                class="pull-left btn btn-default btn-xs ajax"
                data-url="{{{ URL::to('companies/create') }}}"
                data-action="create"
                data-type="companies"
                data-parent-type="{{ isset($model) ? str_replace('events', 'event', strtolower(get_class($model))) : '' }}"
                data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW</button>
            </span>
        </div>
    </div>
</div>

<script type="text/template" id="typeahead-template-company">
    <div><strong><%= datum.value %> (<%= datum.country %>)</strong></div>
    <div><small><%= $.grep([datum.type, datum.function], Boolean).join(',') %></div></small>
</script>
