@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

    <div class="container" id="subscriptions-container">

        <div class="bs-example bs-example-tabs">

            <ul id="renewals-tablist" class="nav nav-tabs" role="tablist">
                <li class="subscriptions-inner active"><a href="#subscriptions_all" role="tab" data-toggle="tab">Subscriptions</a></li>
                <li class="renewals-inner"><a href="#subscriptions_renewals" role="tab" data-toggle="tab">Renewals</a></li>
                <li class="nieuwsbrieven-inner"><a href="#subscriptions_nieuwsbrieven" role="tab" data-toggle="tab">Nieuwsbriefen</a></li>
            </ul>

            <div id="subscriptionsTabContent" class="tab-content">

                <div class="tab-pane fade active in" id="subscriptions_all">
                    @include('admin.subscriptions.all.index')
                </div>
                <div class="tab-pane fade" id="subscriptions_renewals">
                    @include('admin.subscriptions.renewals.index')
                </div>
                <div class="tab-pane fade" id="subscriptions_nieuwsbrieven">
                    @include('admin.subscriptions.nieuwsbrieven.index')
                </div>
            </div>

        </div>
    </div>
@stop

{{-- Scripts --}}
@section('scripts')

<script type="text/javascript">
</script>

@stop
