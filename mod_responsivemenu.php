<?php
/**
 * @package     Joomla.Site
 * @subpackage  responsivemenu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$list		= ModResponsiveMenuHelper::getList($params);
$base		= ModResponsiveMenuHelper::getBase($params);
$active		= ModResponsiveMenuHelper::getActive($params);
$active_id 	= $active->id;
$path		= $base->tree;

$showAll	= $params->get('showAllChildren');
$class_sfx	= htmlspecialchars($params->get('class_sfx'));

if($params->get('loadcss') == '1')
{
	$document = JFactory::getDocument();
	$document->addStyleSheet( JURI::root( true ).'/media/mod_responsivemenu/css/responsivemenu.css' );
	$document->addScript( JURI::root( true ).'/media/mod_responsivemenu/js/responsivemenu.js' );
}

if (count($list))
{
	require JModuleHelper::getLayoutPath('mod_responsivemenu', $params->get('layout', 'default'));
}
