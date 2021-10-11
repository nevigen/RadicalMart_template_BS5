<?php
/*
 * @package     RadicalMart Package
 * @subpackage  com_radicalmart
 * @version     __DEPLOY_VERSION__
 * @author      Delo Design - delo-design.ru
 * @copyright   Copyright (c) 2021 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://delo-design.ru/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Environment\Browser;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

if ($this->mode === 'shop')
{
	HTMLHelper::script('com_radicalmart/cart.min.js', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/axios.min.js', array('version' => 'auto', 'relative' => true));
	if ($this->params->get('radicalmart_js', 1))
	{
		HTMLHelper::script('com_radicalmart/radicalmart.min.js', array('version' => 'auto', 'relative' => true));
	}
}

if ($this->params->get('trigger_js', 1))
{
	HTMLHelper::script('com_radicalmart/trigger.min.js', array('version' => 'auto', 'relative' => true));
}
?>
<div id="RadicalMart" class="product radicalmart-container">
	<h1 class="m-2 text-center">
		<?php echo $this->params->get('seo_product_h1', $this->product->title); ?>
	</h1>
	<div class="card card-default">
		<div class="row" >
			<div class="col-12 col-md-6">
				<div class="rm-product-card-image p3 w-100">
					<?php echo $this->loadTemplate('gallery'); ?>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="rm-product-card-maininfo">
					 <div class="rm-product-card-attributs">Атрибуты</div>
					 <div class="rm-product-card-characteristics">Характеристики</div>
					<?php echo $this->loadTemplate('buy'); ?>
				</div>
			</div>
		</div>
		<hr />
		<div class="rm-product-card-description">
			<div class="p-3">
				<?php echo $this->loadTemplate('info'); ?>
			</div>
		</div>
	</div>
</div>