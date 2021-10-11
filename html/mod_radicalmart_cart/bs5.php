<?php
/*
 * @package     RadicalMart Package
 * @subpackage  mod_radicalmart_cart
 * @version     __DEPLOY_VERSION__
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2021 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Layout\LayoutHelper;

HTMLHelper::script('com_radicalmart/cart.min.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::script('com_radicalmart/axios.min.js', array('version' => 'auto', 'relative' => true));
if ($componentParams->get('radicalmart_js', 1))
{
	HTMLHelper::script('com_radicalmart/radicalmart.min.js', array('version' => 'auto', 'relative' => true));
}
if ($componentParams->get('trigger_js', 1))
{
	HTMLHelper::script('com_radicalmart/trigger.min.js', array('version' => 'auto', 'relative' => true));
}

echo LayoutHelper::render('components.radicalmart.cart.icon');