<div class="row">
    <div class="col-md-12">
        <legend><span class="badge">{{ isset($model) ? count($model->users) : '' }}</span> User Accounts</legend>
    </div>
</div>
@if (isset($model))
    @foreach($model->users as $user)
        <div class="row">
            <div class="col-sm-5 truncate">
                <span class="usernames">{{{ $user->last_name.', '.$user->first_name }}}</span>
            </div>
            <div class="col-sm-3 truncate">
                <span class="usermail">{{{ $user->hasRole('User') ? 'alda' : ($user->hasRole('promoter') ? ($user->types()->first() ? $user->types()->first()->name : 'promoter') : 'admin') }}}</span>
            </div>
            <div class="col-sm-4">
                <div class="btn-group pull-right">
                    <button type="button"
                        data-action="edit"
                        data-type= "user"
                        data-parent-type="{{ strtolower(get_class($model)) }}"
                        data-id="{{ $user->id }}"
                        data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                        data-parent-title="{{ isset($model) ? $model->name : '' }}"
                        class="ajax btn btn-xs fa fa-pencil"></button>
                    <button type="button"
                        data-action="{{ URL::to($controller .'/' . $model->id . '/users/' . $user->id . '/detach' ) }}"
                        class="modal-popup btn btn-xs fa fa-unlink"></button>
                    <button type="button"
                        data-action="{{ URL::to('user/' . $user->id . '/delete' ) }}"
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
                data-prefetch-url="/user"
                data-template-id="typeahead-template-user"
                data-attach-url="{{{ URL::to($controller . '/' . $model->id . '/users/') }}}"
                placeholder="Name" autocomplete="off">
            <span class="input-group-btn">
                <button type="button"
                class="pull-left btn btn-default btn-xs ajax"
                data-url="{{{ URL::to('/admin/user/create') }}}"
                data-action="create"
                data-type="user"
                data-parent-type="{{ isset($model) ? strtolower(get_class($model)) : '' }}"
                data-parent-id="{{ isset($model) ? $model->id : 0 }}"
                data-parent-title="{{ isset($model) ? $model->name : '' }}"><span class="glyphicon glyphicon-plus-sign"></span> ADD NEW</button>
            </span>
        </div>
    </div>
</div>

<script type="text/template" id="typeahead-template-user">
    <div><strong><%= datum.first_name %> <%= datum.last_name %></strong></div>
    <div><small><%= $.grep([datum.email, datum.function], Boolean).join(',') %></div></small>
</script>
