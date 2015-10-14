<?php

use DebugBar\StandardDebugBar;

class EevndoudDebugBar {

	public $debugbarRenderer;

	function __construct()
	{
		global $debugbar;

		$debugbar = new StandardDebugBar();

		return;

		if (is_admin()) {

			add_action( 'admin_head', function() use ($debugbar) {
				$this->debugbarRenderer = $debugbar->getJavascriptRenderer(get_template_directory_uri() . '/vendor/maximebf/debugbar/src/DebugBar/Resources');
    			echo $this->debugbarRenderer->renderHead();
    		});

    		add_action('admin_footer', function() {
    			$this->debugbarRenderer->setOpenHandlerUrl(get_bloginfo('template_url') . '/app/helpers/open.php');
    			echo $this->debugbarRenderer->render();
			});

    	} else {

			add_action('wp_head', function() use ($debugbar) {
				$this->debugbarRenderer = $debugbar->getJavascriptRenderer(get_template_directory_uri() . '/vendor/maximebf/debugbar/src/DebugBar/Resources');
	    		echo $this->debugbarRenderer->renderHead();
	    	});

			add_action('wp_footer', function() {
	    		echo $this->debugbarRenderer->render();
			});
		}

	}
}

$eenvoudDebugbar = new EevndoudDebugBar();

class Debug {

	private static $debugbar;

 	static function timingExample()
 	{
 		global $debugbar;

		try {
			throw new Exception('foobar');
		} catch (Exception $e) {
		    $debugbar['exceptions']->addException($e);
		}

	    $debugbar['time']->startMeasure('longop', 'My long operation');
		usleep(35000);
		$debugbar['time']->stopMeasure('longop');
	    $debugbar['time']->startMeasure('longop2', 'My long operation two');
		usleep(10000);
		$debugbar['time']->stopMeasure('longop2');
 	}

 	static private function _init() {
 		global $debugbar;
 		self::$debugbar = $debugbar;
 	}

 	static private function _complete($is_json_ajax_response = false)
 	{
 		if ($is_json_ajax_response)
 		{
 			self::$debugbar->sendDataInHeaders(true);
 		}
 	}

 	static function info($info, $is_json_ajax_response = false)
 	{
 		self::_init();
 		self::$debugbar['messages']->info($info);
 		self::_complete($is_json_ajax_response);
 	}

 	static function alert($alert, $is_json_ajax_response = false)
 	{
 		self::_init();
 		self::$debugbar['messages']->alert($alert);
 		self::_complete($is_json_ajax_response);
 	}

 	static function error($error, $is_json_ajax_response = false)
 	{
 		self::_init();
 		self::$debugbar['messages']->error($error);
 		self::_complete($is_json_ajax_response);
 	}

  	static function critical($critical, $is_json_ajax_response = false)
  	{
 		self::_init();
 		self::$debugbar['messages']->critical($critical);
 		self::_complete($is_json_ajax_response);
 	}

 	static function exception($exception, $is_json_ajax_response = false)
 	{
 		self::_init();
 		self::$debugbar['exceptions']->addException($exception);
 		self::_complete($is_json_ajax_response);
 	}

 	static function collect()
 	{
 		self::_init();
 		$debugbar->setStorage(new DebugBar\Storage\FileStorage(__DIR__ . '/../storage/logs'));
 		$debugbar->collect();
 	}
}
