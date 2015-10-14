<div class="procyncRoot" class="row"
						data-survey_id_360="{{$company_surveyid}}"
                        data-survey_id_180="{{$agency_surveyid}}"
                        data-agencyname="{{$agency_name}}"
                        data-companyname="{{$company_name}}"
                        data-brandname="{{$brand_name}}"
                        data-relationshiptype="{{$relationship_type}}"
                        data-userrelationship="{{$user_relationship}}"
                        data-userrole="{{$user_role}}"
                        data-usertype="{{$user_type}}"
                        data-do180="{{$doStep180}}"
                        data-do360="{{$doStep360}}">

    <div class="category-navigation-container"></div>
    <div class="col-xs-12 full-height-content">

        <div class="row">
            <div class="groups-nav">
                <ul class="groups-ul text-center"></ul>
            </div>
        </div>

        <!-- questions -->
        <div class="row main-content top-gap-xs">
            <div class="col-xs-10 col-xs-offset-1">

                <div class="row group-brand-container">
                    <h2 class="col-xs-12 text-center group-header"></h2>
					<h2 class="col-xs-12 text-center brand-header">{{$brand_name}}</h2>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center best-in-class top-gap-xs">Is <span class="rel-title"></span> best in class in...</div>
                </div>

                <div class="row ul-wrapper">
                    <div class="col-xs-12">
                    	<div class="ul-container" style="position: relative; height: 16rem;">
                        	<ul class="question-container" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></ul>
                        </div>
                    </div>
                </div>

                <div class="row ul-help-wrapper">
                    <div class="col-xs-2">
                        <a href="#" class="help-toggle"><span class="fa fa-info"></span></a>
                    </div>
                    <div class="col-xs-10 ul-help-container" style="position: relative; height: 16rem;">
                        <ul class="help-container" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"></ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- range input -->
        <div class='row lower-inputs'>
            <div class="col-xs-10 col-xs-offset-1">

                <div class="row">
                    <div class="col-xs-12" style="margin-bottom: -2rem;">
                        <span class='help-block text-center input-val'>5</span>
                        <input class="input-md slider curr-answer survey-range-slider" type="range" min="0" max="10" value="5" step="0.1" data-qid="0">
                        <span class='help-block text-center avg-marker'>average</span>
                    </div>
                </div>

                <!-- next + prev buttons -->
                <div class="row next-prev-buttons">
                    <div class="col-xs-12">
                        <div class='row'>
                            <div class="col-xs-6 text-left">
                                <button class="go-prev-question"><img src="/content/themes/procync/app/assets/images/left.png" alt="previous" width="40" height="40"></button>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button class="go-next-question"><img src="/content/themes/procync/app/assets/images/right.png" alt="Next" width="40" height="40"></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

		@include('survey.parts.thankyou')

    </div>

</div>