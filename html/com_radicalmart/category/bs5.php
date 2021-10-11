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

$showAddition = ((!$this->pagination || (int) $this->pagination->pagesCurrent === 1));
$filter       = (!empty($this->children));
?>

<div id="RadicalMart" class="radicalmart-container category">
	<h1 class="text-center">
		<?php echo $this->params->get('seo_category_h1', $this->category->title); ?>
	</h1>
	<?php if (!empty($this->category->introtext)): ?>
		<div class="rm-category-short-description">
			<?php echo $this->category->introtext; ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($this->children)): ?>
		<div class="children text-center">
			<?php foreach ($this->children as $child): ?>
				<a href="<?php echo $child->link; ?>" class="btn btn-small">
					<?php echo $child->title; ?>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<div class="uk-child-width-expand@m uk-grid-small uk-margin" uk-grid="">
		<?php if ($filter): ?>
			<div class="uk-width-1-4@m uk-visible@m">
				<div class="uk-card uk-card-default uk-card-body uk-card-small">
					<?php echo $this->loadTemplate('filter'); ?>
				</div>
			</div>
		<?php endif; ?>
		<div>
			<div class="uk-card uk-card-default">
				<div class="uk-card-header">
					<div class="uk-grid-small uk-flex-middle" uk-grid>
						<div class="uk-width-expand@s uk-flex uk-flex-center uk-flex-left@s uk-text-small">

						</div>
						<div class="d-flex flex-row justify-content-between mb-3">
							<div>
								<?php if ($filter): ?>
									<span class="uk-button uk-button-default uk-button-small uk-hidden@m"
										  uk-toggle="target: #productsFilters">
										<span class="uk-margin-xsmall-right" uk-icon="icon: settings; ratio: .75;"></span>
										<?php echo Text::_('COM_RADICALMART_FILTERS'); ?>
									</span>
								<?php endif; ?>
								&nbsp;
							</div>
							<div class="buttons-switcher">
								<span class="<?php echo ($this->productsListTemplate === 'grid') ? 'rm-active' : ''; ?> filter-switcher">
									<a onclick="setProductsListTemplate('grid')"  data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<?php echo Text::_('COM_RADICALMART_PRODUCTS_LIST_LAYOUT_GRID'); ?>">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
										<path d="M4 2v2H2V2h2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 2v2H7V2h2zm5 0v2h-2V2h2zM4 7v2H2V7h2zm5 0v2H7V7h2zm5 0h-2v2h2V7zM4 12v2H2v-2h2zm5 0v2H7v-2h2zm5 0v2h-2v-2h2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2z"/></svg>
									</a>
								</span>
								<span class="<?php echo ($this->productsListTemplate === 'list') ? 'rm-active' : ''; ?>  filter-switcher">
									<a onclick="setProductsListTemplate('list')"   data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<?php echo Text::_('COM_RADICALMART_PRODUCTS_LIST_LAYOUT_LIST'); ?>"> 
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list hidden" viewBox="0 0 16 16">									<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>
									</a>
								</span>
							</div>
						</div> 
					</div>
				</div>
				<?php if (empty($this->items)) : ?>
					<div class="card">
						<div class="alert alert-warning">
							<?php echo Text::_('COM_RADICALMART_ERROR_PRODUCTS_NOT_FOUND'); ?>
						</div>
					</div>
				<?php else: ?>
					<div class="products-list-category">
						<?php echo $this->loadTemplate($this->productsListTemplate); ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($this->items && $this->pagination): ?>
				<div class="list-pagination uk-margin-medium">
					<?php echo $this->pagination->getPaginationLinks(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if ($showAddition && !empty($this->category->fulltext)): ?>
		<hr/>
		<div class="rm-category-full-description clearfix fs-6">
			<?php echo $this->category->fulltext; ?>
		</div>
	<?php endif; ?>
	<?php if ($filter): ?>
		<div id="productsFilters" uk-offcanvas="overlay: true">
			<div class="uk-offcanvas-bar">
				<span class="uk-offcanvas-close" type="button" uk-close></span>
				<?php echo $this->loadTemplate('filter'); ?>
			</div>
		</div>
	<?php endif; ?>
</div>