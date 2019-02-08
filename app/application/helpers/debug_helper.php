<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('dd'))
{
	function dd($dump)
	{
		echo '<pre>';
		  var_dump($dump);
		echo '</pre>';
		die;
	}
}

if ( ! function_exists('dump'))
{
	function dump($dump)
	{
		echo '<pre>';
		  var_dump($dump);
		echo '</pre>';
	}
}