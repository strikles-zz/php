<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? count($model->venues) : '' }}</span> Venues</legend>
    </div>
</div>
@if (isset($model))
    @foreach($model->venues as $venue)
        <div class="row">
            <div class="col-sm-8 truncate">{{{ $venue->name }}}</div>
            <div class="col-sm-4">
                <div class="btn-group pull-right">
                    <button type="button"
                        data-action="edit"
                        data-type= "venues"
                        data-parent-type="{{ strtolower(get_class($model)) }}"
                        data-id="{{ $venue->id }}"
                        data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                        data-parent-title="{{ isset($model) ? $model->name : '' }}"
                        class="ajax btn btn-xs fa fa-pencil"></button>
                    <button type="button"
                        data-action="{{ URL::to($controller .'/' . $model->id . '/venues/' . $venue->id . '/detach' ) }}"
                        class="modal-popup btn btn-xs fa fa-unlink"></button>
                    <button type="button"
                        data-action="{{ URL::to('venues/' . $venue->id . '/delete' ) }}"
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
                data-prefetch-url="/venues"
                data-template-id="typeahead-template-venue"
                data-attach-url="{{{ URL::to($controller . '/' . $model->id . '/venues/') }}}"
                placeholder="Name" autocomplete="off">
            <span class="input-group-btn">
                <button type="button"
                class="pull-left btn btn-default btn-xs ajax"
                data-url="{{{ URL::to('venues/create') }}}"
                data-action="create"
                data-type="venues"
                data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
                data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW</button>
            </span>
        </div>
    </div>
</div>

<script type="text/template" id="typeahead-template-venue">
    <div><strong><%= datum.value %> (<%= datum.country %>)</strong></div>
    <div><small><%= $.grep([datum.indoor_or_outdoor == 0 ? 'indoor' : 'outdoor', datum.hall_name], Boolean).join(',') %></div></small>
</script>
