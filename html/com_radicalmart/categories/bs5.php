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

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

if (Factory::getApplication()->getTemplate() !== 'yootheme' && $this->params->get('uikit', 1))
{
	HTMLHelper::stylesheet('com_radicalmart/uikit.min.css', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/uikit.min.js', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/uikit-icons.min.js', array('version' => 'auto', 'relative' => true));
}

if ($this->params->get('trigger_js', 1))
{
	HTMLHelper::script('com_radicalmart/trigger.min.js', array('version' => 'auto', 'relative' => true));
}
?>


<div id="RadicalMart" class="radicalmart-container categories">
	<h1><?php echo $this->params->get('seo_categories_h1', $this->category->title); ?></h1>
	<?php if (!empty($this->category->introtext)): ?>
		<div class="category info">
			<?php echo $this->category->introtext; ?>
		</div>
	<?php endif; ?>
	<?php if (empty($this->items)) : ?>
		<div class="alert alert-warning">
			<?php echo Text::_('COM_RADICALMART_ERROR_CATEGORIES_NOT_FOUND'); ?>
		</div>
	<?php else : ?>
	<div class="container container-categories">
		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 g-lg-3" >
			<?php foreach ($this->items as $item) : ?>
				<div class="item-<?php echo $item->id; ?>">
					<div class="card shadow-sm text-center h-100">
						
							<div class="rm-placeholder-img card-img-top">
									<a href="<?php echo $item->link; ?>">
									<?php if ($icon = $item->media->get('icon'))								{
										echo HTMLHelper::image($icon, htmlspecialchars($item->title),
										array('class' => 'img-fluid'));
									} else {
										echo HTMLHelper::image('com_radicalmart/no-image.svg', htmlspecialchars($item->title),
										array(), true);
									} ?>
									</a>
							</div>
							<div class="card-body">
								<a href="<?php echo $item->link; ?>"><h2 class=""><?php echo $item->title; ?></h2></a>
								<div class="card-text">
									<?php echo Text::_('COM_RADICALMART_PRODUCTS_LIST'); ?>
								</div>
							</div>
						</a>
						</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if (!empty($this->category->fulltext)): ?>
		<div class="fulltext">
			<?php echo $this->category->fulltext; ?>
		</div>
	<?php endif; ?>
</div>