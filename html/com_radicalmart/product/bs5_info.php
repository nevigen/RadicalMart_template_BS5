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

?>
<?php if (!empty($this->product->categories)): ?>
	<div class="categories uk-margin">
		<?php foreach ($this->product->categories as $category): ?>
			<a href="<?php echo $category->link; ?>" class="badge bg-info"> #<?php echo $category->title; ?> </a>
			&nbsp;
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<?php if (!empty($this->product->introtext)): ?>
	<div>
		<?php echo $this->product->introtext; ?>
	</div>
<?php endif; ?>