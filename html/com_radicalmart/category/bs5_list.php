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
         <?php foreach ($this->items as $i => $item): ?>
			<div class="category-type-list-product">
             <div class="g-0 border rounded overflow-hidden flex-md-row  mb-4 shadow-sm h-md-250 position-relative">
                 <div class=" d-flex justify-content-between align-items-center">
				 <div class="col-3 d-none d-lg-block">
                     <a href="<?php echo $item->link; ?>">
                         <?php if ($image = $item->image)
							{ $image = RadicalMartHelperMedia::findThumb($image);
								echo HTMLHelper::image($image, htmlspecialchars($item->title),
									array('class' => 'uk-height-max-medium'));
							}else{
								echo HTMLHelper::image('com_radicalmart/no-image.svg', htmlspecialchars($item->title),
									array('class' => 'uk-height-max-medium'), true);
						} ?>
                     </a>

                 </div>
                 <div class="flex-fill p-4 d-flex flex-column position-static">
                     <div class="d-inline-block mb-2">
						 <?php if ($item->category): ?>
							 <div class="rm-text-meta">
								 <a href="<?php echo $item->category->link; ?>"
									 class="uk-text-nowrap uk-text-small uk-link-muted">
									 <?php echo $item->category->title; ?>
								 </a>
							 </div>
                         <?php endif; ?>
                     </div>
                     <a href="<?php echo $item->link; ?>"><span class="product-title-category"><?php echo $item->title; ?></span></a>
                     <div class="mb-1 text-muted">Свойства товара</div>
                 </div>
				  <div class="col-sm-3 p-3 d-flex flex-column position-static">
					 <div class="category-product-block-price text-center">
								<?php if ($item->price['discount_enable']): ?>
									<div class="category-product-old-price mb-4">
										<s><?php echo $item->price['base_string']; ?></s>
									</div>
								<?php endif; ?>
								<div class="category-product-price">
									<span><?php echo $item->price['final_string']; ?></span>
								</div>
						</div>
                         <div class="uk-margin">
                             <?php if ($mode === 'shop' && (int) $item->state === 1): ?>
                             <div radicalmart-cart="product" data-id="<?php echo $item->id; ?>">
                                 <span radicalmart-cart="add" class="uk-button uk-button-primary">
                                     <?php echo Text::_('COM_RADICALMART_CART_ADD'); ?>
                                 </span>
                             </div>
                             <?php elseif ($mode === 'catalog'): ?>
                             <a href="<?php echo $item->link; ?>" class="uk-button uk-button-primary">
                                 <?php echo Text::_('COM_RADICALMART_READMORE'); ?>
                             </a>
                             <?php endif; ?>
                         </div>
				  </div>
             </div>
             </div>
            </div>
             <?php endforeach; ?>
     </div>