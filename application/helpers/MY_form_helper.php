<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Text Date Field
 *
 * @access public
 * @param mixed
 * @param string
 * @param string
 * @return string
 */
if ( ! function_exists('form_date'))
{
function form_date($data = "", $value = "", $extra = "")
{
$defaults = array('type' => 'date', 'name' => (( ! is_array($data)) ? $data : ""), 'value' => $value);
return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}
}
