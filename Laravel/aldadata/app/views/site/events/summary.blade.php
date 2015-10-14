<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? count($model->events) : '' }}</span> Events</legend>
    </div>
</div>
@if (isset($model))
    @foreach($model->events as $event)
        <div class="row">
            <div class="col-sm-5 truncate">{{{ $event->name }}}</div>
            <div class="col-sm-3 truncate"><small>{{{ $event->date()->first() ? date('j-n-Y', strtotime($event->date->first()->datetime_start)) : 'No date' }}}</small></div>
            <div class="col-sm-4">
                <div class="btn-group pull-right">
                    <button type="button"
                        data-action="edit"
                        data-type= "events"
                        data-parent-type="{{ strtolower(get_class($model)) }}"
                        data-id="{{ $event->id }}"
                        data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                        data-parent-title="{{ isset($model) ? $model->name : '' }}"
                        class="ajax btn btn-xs fa fa-pencil"></button>
                    <button type="button"
                        data-action="{{ URL::to($controller .'/' . $model->id . '/events/' . $event->id . '/detach' ) }}"
                        class="modal-popup btn btn-xs fa fa-unlink"></button>
                    <button type="button"
                        data-action="{{ URL::to('events/' . $event->id . '/delete' ) }}"
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
                data-prefetch-url="/events"
                data-template-id="typeahead-template-event"
                data-attach-url="{{{ URL::to($controller . '/' . $model->id . '/events/') }}}"
                placeholder="Name" autocomplete="off">
            <span class="input-group-btn">
                <button type="button"
                class="pull-left btn btn-default btn-xs ajax"
                data-url="{{{ URL::to('events/create') }}}"
                data-action="create"
                data-type="events"
                data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
                data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW</button>
            </span>
        </div>
    </div>
</div>

<script type="text/template" id="typeahead-template-event">
    <div><strong><%= datum.value %> </strong></div>
    <div><small><%= datum.event_date %></div></small>
</script>
