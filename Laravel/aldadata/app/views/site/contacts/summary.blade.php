<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? count($model->contacts) : '' }}</span> Contacts</legend>
    </div>
</div>
@if (isset($model))
    @foreach($model->contacts as $contact)
        <div class="row">
            <div class="col-sm-8 truncate">{{{ $contact->first_name }}} {{{ $contact->last_name }}}</div>
            <div class="col-sm-4">
                <div class="btn-group pull-right">
                    <button type="button"
                        data-action="edit"
                        data-type= "contacts"
                        data-parent-type="{{ strtolower(get_class($model)) }}"
                        data-id="{{ $contact->id }}"
                        data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                        data-parent-title="{{ isset($model) ? $model->name : '' }}"
                        class="ajax btn btn-xs fa fa-pencil"></button>
                    <button type="button"
                        data-action="{{ URL::to($controller .'/' . $model->id . '/contacts/' . $contact->id . '/detach' ) }}"
                        class="modal-popup btn btn-xs fa fa-unlink"></button>
                    <button type="button"
                        data-action="{{ URL::to('contacts/' . $contact->id . '/delete' ) }}"
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
                data-prefetch-url="/contacts"
                data-template-id="typeahead-template-contact"
                data-attach-url="{{{ URL::to($controller . '/' . $model->id . '/contacts/') }}}"
                placeholder="Name" autocomplete="off">
            <span class="input-group-btn">
                <button type="button"
                class="pull-left btn btn-default btn-xs ajax"
                data-url="{{{ URL::to('contacts/create') }}}"
                data-action="create"
                data-type="contacts"
                data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
                data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW</button>
            </span>
        </div>
        {{--
        <a href="{{{ URL::to('contacts/create') }}}" class="pull-left btn btn-black btn-info btn-xs ajax "
            data-action="create"
            data-type="contacts"
            data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
            data-parent-id="{{ isset($model) ? $model->id : 0 }}"
            data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW CONTACT</a>
        --}}
    </div>
</div>

<script type="text/template" id="typeahead-template-contact">
    <div><strong><%= datum.first_name %> <%= datum.last_name %> (<%= datum.country %>)</strong></div>
    <div><small><%= $.grep([datum.email, datum.function], Boolean).join(',') %></div></small>
</script>
