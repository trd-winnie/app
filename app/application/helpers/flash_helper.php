<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('flash'))
{
	function flash($type, $msg)
	{
		$ci =& get_instance();
		$ci->session->set_flashdata('flash_type', $type);
		$ci->session->set_flashdata('flash_msg', $msg);
	}
}

if ( ! function_exists('flash_messages'))
{
	function flash_messages()
	{
		$ci =& get_instance();
		$type = $ci->session->flash_type;
		$msg = $ci->session->flash_msg;

		echo '<div class="alert alert-'.$type.'">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$msg.'
		</div>';
	}
}