<?php
/**
 * @package     Joomla.Site
 * @subpackage  responsivemenu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<style>
/* Mobile menu */
a.mmenu-open {
	background-color:<?php echo $params->get('menutogglebackground'); ?>;
	color:<?php echo $params->get('menulabelcolor'); ?>;
	height:<?php echo $params->get('menutoggleheight'); ?>;
}
nav.mmenu {
	background:<?php echo $params->get('mobilebackground'); ?>;
}
nav.mmenu ul li.active {
	background-color:<?php echo $params->get('mobileactivebackground'); ?>;
}
nav.mmenu ul li a, .menu-close {
	color:<?php echo $params->get('mobiletextcolor'); ?>;
}

@media (min-width: <?php echo $params->get('mobilebreak'); ?>) {
	a.mmenu-open {
		display:none;
	}
}
@media (max-width: <?php echo $params->get('mobilebreak'); ?>) {
	<?php echo $params->get('mobiledisappear'); ?> {
		display: none;
	}
}
<?php echo $params->get('customcss'); ?>
</style>
<a href="#" class="mmenu-open <?php echo $params->get('menutogglefixed'); ?> <?php echo $params->get('menutoggletop'); ?>" onclick="return false">
	<i class="glyphicon glyphicon-menu-hamburger"></i> <?php echo $params->get('menulabel'); ?>
</a>

<nav class="mmenu">
	<a href="#" class="menu-close" onclick="return false">
		<?php echo JText::_('MOD_RESPONSIVEMENU_BACK'); ?>
	</a>
	<ul>
	<?php
	foreach ($list as $i => &$item)
	{
		$class = "";
		$class_sub = "";
		if (in_array($item->id, $path))
		{
			$class .= 'submenu-open active';
			$class_sub = 'submenu-open';
		}
		if($item->deeper) {
			$class .= ' deeper';
		}
		if ($item->deeper && $params->get('mobilesubmenuopened') == '1')
		{
			$class .= ' submenu-open';
		}
		if (!empty($class))
		{
			$class = ' class="' . trim($class) . '"';
		}
		echo '<li' . $class . '>';

		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
			case 'heading':
				require JModuleHelper::getLayoutPath('mod_responsivemenu', 'default_' . $item->type);
				break;
			default:
				require JModuleHelper::getLayoutPath('mod_responsivemenu', 'default_url');
				break;
		endswitch;

		if ($item->deeper)
		{
			echo '<a href="#" class="sub-toggle" onclick="return false"></a>';
			if($params->get('mobilesubmenuopened') == '1') {
				$class_sub = 'submenu-open';
			}
			echo '<ul class="submenu ' . $class_sub . '">';
		}
		elseif ($item->shallower)
		{
			echo '</li>';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		else
		{
			echo '</li>';
		}
	}
	?></ul>
</nav>
