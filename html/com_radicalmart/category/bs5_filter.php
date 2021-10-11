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

use Joomla\CMS\Language\Text;

?>
<ul class="uk-list uk-list-divider" uk-accordion="collapsible: false">
	<?php if (!empty($this->children)): ?>
		<li class="uk-open">
			<a class="uk-accordion-title" href="#">
				<?php echo Text::_('COM_RADICALMART_CATEGORIES'); ?>
			</a>
			<div class="uk-accordion-content">
				<ul class="uk-list uk-margin-remove">
					<?php foreach ($this->children as $child): ?>
						<li>
							<a href="<?php echo $child->link; ?>" class="uk-link-reset">
								<?php echo $child->title; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</li>
	<?php endif; ?>
</ul>