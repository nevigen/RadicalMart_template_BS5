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

use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\HTML\HTMLHelper;

?>
<div class="products-wrapper">
	<div class="row g-2" data-masonry='{"percentPosition": true }' >
		<?php foreach ($this->items as $item) : ?>
			<div class="col-sm-12 col-md-4">
				<div class="card shadow-sm text-center">
					<div class="rm-product-block">
						<div class="">
							<a href="<?php echo $item->link; ?>"
							   class="">
								<?php if ($image = $item->image)
								{
									$image = RadicalMartHelperMedia::findThumb($image);
									echo HTMLHelper::image($image, htmlspecialchars($item->title),
										array('class' => 'img-fluid'));
								}
								else
								{
									echo HTMLHelper::image('com_radicalmart/no-image.svg', htmlspecialchars($item->title),
										array('class' => 'uk-height-max-medium'), true);
								} ?>
							</a>
						</div>
						<div  class="middle">
							<?php if ($item->category): ?>
								<div  class="hidden">
									<a href="<?php echo $item->category->link; ?>"class="rm-text-meta"><?php echo $item->category->title; ?></a>
								</div>
							<?php endif; ?>
							<div class="mt-1">
								<a href="<?php echo $item->link; ?>" class="uk-link-reset"><span class="product-title-category"><?php echo $item->title; ?></span></a>
							</div>
						</div>
						<div class="category-product-block-price text-center g-3 ">
								<?php if ($item->price['discount_enable']): ?>
									<div>
										<s class="category-product-old-price "><?php echo $item->price['base_string']; ?></s>
									</div>
								<?php endif; ?>
								<div class="category-product-price m-4">
									<span><?php echo $item->price['final_string']; ?></span>
								</div>
						</div>
						<div class="category-product-buttons m-4">
							<?php if ($mode === 'shop' && (int) $item->state === 1): ?>
								<div radicalmart-cart="product" data-id="<?php echo $item->id; ?>">
									<span radicalmart-cart="add" class="btn btn-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
										<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
										<?php echo Text::_('COM_RADICALMART_CART_ADD'); ?>
								</span>
								</div>
							<?php elseif ($mode === 'catalog'): ?>
								<a href="<?php echo $item->link; ?>"
								   class="uk-icon-button uk-background-primary uk-light" uk-icon="chevron-right"
								   uk-tooltip="" title="<?php echo Text::_('COM_RADICALMART_READMORE'); ?>"></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>