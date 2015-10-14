
<?php

return array(

    /**
     * Mapping for all classes without a namespace.
     * The key is the class name and the value is the
     * absolute path to your class file.
     *
     * Watch your commas...
     */
    // Controllers
    'BaseController'       => themosis_path('app').'controllers'.DS.'BaseController.php',
    'PageController'       => themosis_path('app').'controllers'.DS.'PageController.php',
    'LimesurveyController' => themosis_path('app').'controllers'.DS.'LimesurveyController.php',
    'ReportingController'  => themosis_path('app').'controllers'.DS.'ReportingController.php',

    // Models
    'PostModel'            => themosis_path('app').'models'.DS.'PostModel.php',
    'LimesurveyModel'      => themosis_path('app').'models'.DS.'LimesurveyModel.php',
    'SurveyModel'          => themosis_path('app').'models'.DS.'SurveyModel.php',
    'UserModel'            => themosis_path('app').'models'.DS.'UserModel.php',
    'EvaluationModel'      => themosis_path('app').'models'.DS.'EvaluationModel.php',
    'RelationModel'        => themosis_path('app').'models'.DS.'RelationModel.php',

    // Miscellaneous
    //'DebugBar'  => themosis_path('base').'vendor'.DS.'maximebf'.DS.'debugbar'.DS.'src'.DS.'DebugBar'.DS.'Debugbar.php'
);

