<script type="text/ng-template" id="myModalContent.html">

    <form role="form" ng-controller="PromoterController">
        <div class="modal-header">
            <h3 class="modal-title">Notify Pomoter</h3>
        </div>
        <div class="modal-body">
            <div class="form-group notification-subject">
                <input type="text" ng-model="email_obj.subject" class="form-control" placeholder="subject:"></input>
            </div>
            <div class="form-group notification-message">
                <textarea class="form-control" ng-model="email_obj.message" placeholder="message:"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" ng-click="ok()">OK</button>
            <button type="button" class="btn btn-danger" ng-click="cancel()">Cancel</button>
        </div>
    </form>
    
</script>



<script type="text/ng-template" id="datepicker_modal.html">

    <form role="form" ng-controller="TaskController">
        <div class="modal-header">
            <h3 class="modal-title">Set task due date</h3>
        </div>
        <div class="modal-body">
            <div class="container" style="min-height:290px; width:100%">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <datepicker ng-model="date_obj.pdate" show-weeks="true" class="well well-sm"></datepicker>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" ng-click="ok()">OK</button>
            <button type="button" class="btn btn-danger" ng-click="cancel()">Cancel</button>
        </div>
    </form>

</script>
