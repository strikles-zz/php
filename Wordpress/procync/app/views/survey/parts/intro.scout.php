<div class="procyncIntro">
    <div class="container-fluid">

        <div class="row intro-logo">
            <div class="col-xs-12 text-center">
                <img src="/content/themes/procync/app/assets/images/logo.png" alt="Procync">
            </div>
        </div>

        @include('survey.parts.intro.welcome')
        @include('survey.parts.intro.welcome2')

        <div class='row lower-inputs'>
            <div class="col-xs-10 col-xs-offset-1">

                <div class="row">
                    <div class="col-xs-12">
                        <input class="input-md slider curr-answer" type="range" min="0" max="10" value="2" step="1">
                    </div>
                </div>

                <div class="row next-prev-buttons">
                    <div class="col-xs-12">
                        <div class='row text-center'>
                        	<button class="login-action"><h2>Next</h2></button>
                            <button class="login-action2" style="display: none;"><h2>Next</h2></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>