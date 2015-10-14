<?php

class Emailer
{
	private $from_name = 'ProCync';
	private $from_email = 'no-reply@procync.com';

	public $body;
	public $headers;
	public $attachments = [];
	private $debug;

	public function __construct()
	{
		$this->headers = [
			'From: ' . $this->from_name . ' ' . '<' . $this->from_email . '>' . "\r\n",
			'Content-Type: text/html; charset=UTF-8'
		];

		$this->debug = false;
	}

	/**
	 * Compose e-mail body by getting the scout template and parsing the vars
	 * @param  Array 	$args 	Array that should at least contains 'template' and all vars needed to pars the template
	 * @return Emailer       	Return the instance of the Emailer class for chaining
	 */
	public function compose($args)
	{
		extract($args);
		if (!isset($template))
		{
			throw new Exception('No template set');
			return false;
		}

		$this->body = View::make('emails/compiled/' . $template, $args)->render();
		//error_log('got this far');

		return $this;
	}

	/**
	 * Use this function to create the raw e-mail body, preserving the tags, so you can run it through the inliner at:
	 * http://zurb.com/ink/inliner.php
	 *
	 * @return [type] [description]
	 */
	public static function raw($template)
	{
		$main = file_get_contents(__DIR__ .'/../views/emails/layouts/main.scout.php');
		ob_start();
		include __DIR__ .'/../views/emails/source/' . $template . '.scout.php';
		$template = ob_get_contents();
		ob_end_clean();

		//die();
		$out = str_replace("@yield('main')", $template, $main);
		$out = str_replace(["@extends('emails.layouts.main')", "@section('main')", "@stop"], "", $out);
		$out = trim($out);

		return $out;
	}

	/**
	 * Send the e-mail
	 * @param  Array 	$args 	Should at least contain 'to' and 'subject'.
	 * @return boolean       	Whether the email contents were sent successfully.
	 */
	public function send($args)
	{
		extract ($args);

		if (!isset($this->body) || empty($this->body))
		{
			throw new Exception('No body set');
			return false;
		}

		if (!isset($to))
		{
			throw new Exception('No recipient set');
			return false;
		}

		if (!isset($subject))
		{
			throw new Exception('No subject set');
			return false;
		}

		if($this->debug || strpos(get_bloginfo('url'), 'staging'))
		{
			$to = "andre@eenvoudmedia.nl";
			error_log('>>> Emailer address overriden - To: '.$to);
		}

		return wp_mail($to, $subject, $this->body, $this->headers, $this->attachments);
	}
}