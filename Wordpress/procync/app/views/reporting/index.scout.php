<!-- View stored in app/views/welcome.scout.php -->
@include('header')

    <div ng-app="procyncReporting" id="procyncReporting">

        <div class='container-fluid' ng-controller="ProcyncReportingController">
            <div ng-view></div>
        </div>

        @include('reporting.parts.relations')
        @include('reporting.parts.dashboard')
        @include('reporting.parts.selectedgroup')

    </div>

    @include('reporting.parts.footer')

@include('footer')