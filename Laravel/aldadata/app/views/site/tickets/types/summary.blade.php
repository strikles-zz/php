<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? $model->ticket_types()->count() : '' }}</span> Ticket Types</legend>
    </div>
</div>

@if (isset($model))
    @foreach($model->ticket_types()->orderBy('order')->get() as $ticket_type)
        <div class="row">
            <div class="col-sm-6">{{{ $ticket_type->name }}}</div>
            <div class="col-sm-2">{{{ $ticket_type->num_available }}}</div>
            <div class="col-sm-4 text-right">
                <div class="btn-group">
                    <button type="button"
                        data-action="edit"
                        data-type= "tickettypes"
                        data-parent-type="{{ get_class($model) }}"
                        data-id="{{ $ticket_type->id }}"
                        data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                        data-parent-title="{{ isset($model) ? $model->name : '' }}"
                        class="ajax btn btn-xs fa fa-pencil"></button>
                    <button type="button" data-action="{{ URL::to('/tickettypes/'.$ticket_type->id.'/delete' ) }}" class="modal-popup btn btn-xs btn-delete fa fa-trash"></button>
                </div>
            </div>
        </div>
    @endforeach
@endif

<a href="{{{ URL::to('/events/'.$model->id.'/tickettypes/create') }}}" class="btn btn-sm btn-promary btn-black ajax pull-right"
    data-action="create"
    data-type="tickettypes"
    data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
    data-parent-id="{{ isset($model) ? $model->id : 0 }}"
    data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> Add Ticket Type</a>

