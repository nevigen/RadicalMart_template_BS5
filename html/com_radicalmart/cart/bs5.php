<?php
/*
 * @package     RadicalMart Package
 * @subpackage  com_radicalmart
 * @version     __DEPLOY_VERSION__
 * @author     Nevigen.com
 * @copyright   Copyright (c) 2021 Delo Design. All rights reserved.
 * @license     GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 * @link        https://nevigen.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

if (Factory::getApplication()->getTemplate() !== 'yootheme' && $this->params->get('uikit', 1))
{
	HTMLHelper::stylesheet('com_radicalmart/uikit.min.css', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/uikit.min.js', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/uikit-icons.min.js', array('version' => 'auto', 'relative' => true));
}

HTMLHelper::script('com_radicalmart/cart.min.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::script('com_radicalmart/axios.min.js', array('version' => 'auto', 'relative' => true));

if ($this->params->get('radicalmart_js', 1))
{
	HTMLHelper::script('com_radicalmart/radicalmart.min.js', array('version' => 'auto', 'relative' => true));
}

if ($this->params->get('trigger_js', 1))
{
	HTMLHelper::script('com_radicalmart/trigger.min.js', array('version' => 'auto', 'relative' => true));
}
?>

<div id="RadicalMart" class="cart radicalmart-container">
	<?php if (empty($this->cart) || empty($this->cart->products)): ?>
		<h1 class="h2 text-center">
			<?php echo Text::_('COM_RADICALMART_CART_EMPTY'); ?>
		</h1>
		<div class="text-muted text-center"><?php echo Text::_('COM_RADICALMART_CART_EMPTY_DESC'); ?></div>
	<?php else: ?>
		<h1 class="h2 text-center">
			<?php echo $this->params->get('seo_cart_h1', $this->menu->title); ?>
		</h1>
		
		<div class="col-lg-12">
		  <div class="card wish-list mb-3">
			<div class="card-body">
				<?php foreach ($this->cart->products as $product): ?>

					<div class="row mb-4" radicalmart-cart="product" data-id="<?php echo $product->id; ?>" data-cart-product="1">
						<div class="col-md-5 col-lg-3 col-xl-3">
						  <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
								<a href="<?php echo $product->link; ?>">
									<?php if ($image = $product->image)
									{
										$image = RadicalMartHelperMedia::findThumb($image);
										echo HTMLHelper::image($image, htmlspecialchars($product->title),
											array('class' => 'img-fluid w-100'));
									}
									else
									{
										echo HTMLHelper::image('com_radicalmart/no-image.svg',
											htmlspecialchars($product->title),
											array('class' => 'uk-height-max-medium'), true);
									} ?>
								</a>
						  </div>
						</div>
						<div class="col-md-7 col-lg-9 col-xl-9">
						  <div class="row d-flex justify-content-between align-items-center">
							<div class="col-12 col-lg-6">
								<div>
									<h5><a href="<?php echo $product->link; ?>" class="uk-link-reset"><?php echo $product->title; ?></a></h5>
										<?php if ($product->category): ?>
											<div>
												<a href="<?php echo $product->category->link; ?>"
												   class="uk-text-nowrap uk-link-muted">
													<?php echo $product->category->title; ?>
												</a>
											</div>
										<?php endif; ?>
									<div>
										<p class="mb-3 text-muted text-uppercase small">хар-ка</p>
										<p class="mb-2 text-muted text-uppercase small">хар-ка</p>
										<p class="mb-3 text-muted text-uppercase small">хар-ка</p>
									</div>
								</div>
							</div> 
							<div class="col-12 col-lg-6">
								<div class="d-flex flex-column text-center">
									<p class="mb-0">
										<span>
											<?php if ($product->order['discount_enable']): ?>
												<div class="uk-text-small uk-text-muted">
													<s radicalmart-cart="product_cart" data-id="<?php echo $product->id; ?>"
													   data-display="base_string">
														<?php echo $product->order['base_string']; ?>
													</s>
													<?php echo ' ( - ' . $product->order['discount_string'] . ')'; ?>
												</div>
											<?php endif; ?>
											<div><?php echo $product->order['final_string']; ?></div>
										</span>
										<?php if ($product->order['discount_enable']): ?>
												<div class="text-muted uk-text-nowrap">
													<s radicalmart-cart="product_cart" data-id="<?php echo $product->id; ?>"
													   data-display="sum_base_string">
														<?php echo $product->order['sum_base_string']; ?>
													</s>
													<?php echo ' ( - ' . $product->order['discount_string'] . ')'; ?>
												</div>
											<?php endif; ?>
											<div class="mb-2 mt-2">
												<div class="input-group  m-auto  w-50">
													<span class="input-group-text rm-cart-btn minus" radicalmart-cart="quantity_minus"><i class="fas fa-minus"></i></span>
													<input radicalmart-cart="quantity" type="text" name="quantity" data-set="1"
															   class="form-control text-center tm-cart-qty"
															   step="1" min="1" value="<?php echo $product->order['quantity']; ?>"/>
													<span class="input-group-text rm-cart-btn plus" radicalmart-cart="quantity_plus"><i class="fas fa-plus"></i></span>

												</div>
											</div>
											<div class="fw-bold fs-4"
												 radicalmart-cart="product_cart" data-id="<?php echo $product->id; ?>"
												 data-display="sum_final_string">
												<?php echo $product->order['sum_final_string']; ?>
											</div>
								  </p>
								</div>
							</div>
						</div>
							<div class="d-flex align-items-center">
								<div>
								<span class="me-3 tm-btn-cart-remove tm-text-small" radicalmart-cart="remove">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
									  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
									  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg> 
									Удалить товар 
								</span>
								</div>
								<div>
									<span class="tm-btn-cart-wishlist tm-text-small" radicalmart-cart="wishlist">
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
												<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
											</svg>
										</span>
										Добавить в избранные
									</span>
									</div>
							  </div>
						  
						</div>
					  </div>
					<hr class="mb-4">	  				
				<?php endforeach; ?>
		</div>

			<div class="tm-cart-total-wrapper ">
				<div class="ms-auto p-3 w-50">
					<div class="tm-cart-subtotal fs-5">
						<div class="row row-cols-2">
							<div class="col">
								<?php echo Text::_('COM_RADICALMART_SUBTOTAL'); ?>
							</div>
							<div  class="col" radicalmart-cart="total" data-display="base_string">
								<?php echo $this->cart->total['base_string']; ?>
							</div>
						</div>

						<div class="row row-cols-2">
							<div class="col">
								<?php echo Text::_('COM_RADICALMART_PRICE_DISCOUNT'); ?>
							</div>
							<div class="col text-danger">
								−<span radicalmart-cart="total" data-display="discount_string">
									<?php echo $this->cart->total['discount_string']; ?>
								</span>
							</div>
						</div>
					</div>
					<hr class="uk-margin-remove">
					<div class="tm-cart-total fs-3">
						<div class="row row-cols-2">
							<div class="col">
								<?php echo Text::_('COM_RADICALMART_TOTAL'); ?>
							</div>
							<div class="col fw-bold" radicalmart-cart="total"
								 data-display="final_string">
								<?php echo $this->cart->total['final_string']; ?>
							</div>
						</div>

						<div class="uk-text-small uk-text-left uk-text-muted uk-margin-small-top">
							<?php echo Text::_('JGRID_HEADING_ID') . ': ' . $this->cart->id; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<div class="d-flex justify-content-end">
		<a href="<?php echo $this->checkout; ?>"
	   class="btn btn-primary btn-lg m-2"> 
		<?php echo Text::_('COM_RADICALMART_CHECKOUT'); ?></a>
</div>














