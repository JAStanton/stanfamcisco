<?php
//// ==================================================================
// Theme options settings
//// ==================================================================
$themename = 'Theme';
$shortname = 'ace_';
$options = array (

array(
  'name' => 'Theme',
  'type' => 'header'
  ),
//// ==================================================================
// General
//// ==================================================================
array('type'=>'class','class'=>'<div id="general">'),
array(
  'name' => 'Custom favicon',
  'id' => $shortname.'favicon',
  'type' => 'upload',
  "size" => '16x16',
  'note' => '',
  'std' => '',
  ),
array(
  'name' => 'Footer credit',
  'id' => $shortname.'footer_credit',
  'type' => 'editor',
  'note' => '',
  ),
array('type'=>'class','class'=>'</div>'),
//// ==================================================================
// Extra inputs
//// ==================================================================
array('type'=>'class','class'=>'<div id="extra">'),
array(
  'name' => 'Header script(s)',
  'id' => $shortname.'header_scripts',
  'type' => 'textarea',
  'note' => 'Place your necessary code here, anything that needs to be placed before <strong>&#60;/head&#62;</strong>.',
  ),
array(
  'name' => 'Footer script(s)',
  'id' => $shortname.'footer_scripts',
  'type' => 'textarea',
  'note' => 'Place your necessary code here, anything that needs to be placed before <strong>&#60;/body&#62;</strong>.',
  ),
array(
  'name' => 'Custom CSS',
  'id' => $shortname.'css',
  'type' => 'textarea',
  'note' => 'Add some custom CSS to your theme.',
  ),
array('type'=>'class','class'=>'</div>'),
//// ==================================================================
// 404 Error
//// ==================================================================
array('type'=>'class','class'=>'<div id="404">'),
array(
  'name' => '404 Page Content',
  'id' => $shortname.'404_page',
  'type' => 'editor',
  'note' => '',
  ),
array('type'=>'class','class'=>'</div>'),

);