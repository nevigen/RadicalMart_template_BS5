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

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
?>
<div class="">
	<div class="price">
		<?php if ($this->product->price['discount_enable']): ?>
			<div class="text-small text-muted">
				<s><?php echo $this->product->price['base_string']; ?></s>
			</div>
		<?php endif; ?>
		<div class="uk-text-large">
			<strong>
				<?php echo $this->product->price['final_string']; ?>
			</strong>
		</div>
		<?php if ($this->product->price['discount_enable']): ?>
			<div class="text-small">
				<?php
				echo Text::_('COM_RADICALMART_PRICE_DISCOUNT') . ' ' . $this->product->price['discount_string'];
				if ($this->product->price['discount_end'])
				{
					echo ' ' . Text::_('COM_RADICALMART_PRICE_DISCOUNT_END') . ' '
						. HTMLHelper::date($this->product->price['discount_end'], Text::_('DATE_FORMAT_LC1'));
				}
				?>
			</div>
		<?php endif; ?>
	</div>
	<?php if ((int) $this->product->state === 1 && $this->mode === 'shop'): ?>
		<div radicalmart-cart="product" data-id="<?php echo $this->product->id; ?>" class="uk-margin">
			<div class="mb-2 mt-2">
				<div class="input-group  rm-product-card-qty">
					<span class="input-group-text rm-cart-btn minus" radicalmart-cart="quantity_minus"><i class="fas fa-minus"></i></span>
					<input radicalmart-cart="quantity" type="text" name="quantity"
						   class="form-control text-center tm-cart-qty"
						   step="1" min="1" value="1"/>
					<span class="input-group-text rm-cart-btn plus" radicalmart-cart="quantity_plus"><i class="fas fa-plus"></i></span>

				</div>
			</div>
			
			<div>
				<span radicalmart-cart="add" class="btn btn-primary">
					<?php echo Text::_('COM_RADICALMART_CART_ADD'); ?>
				</span>
			</div>
		</div>
	<?php endif; ?>
</div>
