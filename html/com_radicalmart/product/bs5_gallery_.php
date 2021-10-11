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

$gallery = $this->product->media->get('gallery', array());
?>
<div class="rm-product-card-gallery p-3">
	<div id="rm-product-card-slider" class="carousel slide" data-bs-ride="carousel">
		<?php if ($gallery): ?>
			<div class="carousel-indicators">
				<?php $sli=0; ?>
				<?php foreach ($gallery as $image): ?>
					<button type="button" data-bs-target="#rm-product-card-slider" data-bs-slide-to="<?php echo $sli ?>" class="active" aria-current="true" aria-label="<?php echo  htmlspecialchars($this->product->title) ?>"></button>
				<?php $sli++; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		
		<?php if ($gallery):?>
			<div class="carousel-inner">
				<?php $sli=0; ?>
				<?php foreach ($gallery as $image): ?>
					<div class="carousel-item <?php if ($sli==0) echo 'active' ?>">
							<?php echo HTMLHelper::image($image, htmlspecialchars($this->product->title), array('class' => 'd-block w-100')); ?>
						</div>
					<?php $sli++;  ?>
					<?php endforeach; ?>
				<?php else: ?>
					<div>
						<?php echo HTMLHelper::image('com_radicalmart/no-image.svg', htmlspecialchars($this->product->title),
							array('class' => 'd-block w-100'), true); ?>
					</div>
			</div>
		<?php endif; ?>
		
		<?php if ($gallery): ?>
			<button class="carousel-control-prev" type="button" data-bs-target="#rm-product-card-slider" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#rm-product-card-slider" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		<?php endif; ?>
		
		<?php if ($gallery): ?>
		<hr/>
		<div class="d-block "> 
		
			<div class="carousel-thumbs">
				<?php $sli=0; ?>
				<?php	foreach ($gallery as $image): ?>
						<div class="carousel-thumbs-item"><?php $image = RadicalMartHelperMedia::findThumb($image);
						echo HTMLHelper::image($image, htmlspecialchars($this->product->title), array('data-bs-slide-to' => '2')); ?></div>
					<?php $sli++;  ?>
					<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>





<div hidden>
<?php if ($gallery): ?>
		<a href="#" class="uk-position-center-left uk-position-small uk-icon-button"
		   uk-icon="icon: chevron-left;" uk-slideshow-item="previous"></a>
		<a href="#" class="uk-position-center-right uk-position-small uk-icon-button"
		   uk-icon="icon: chevron-right;" uk-slideshow-item="next"></a>
		<ul class="el-nav uk-thumbnav uk-flex-left uk-margin-top">
			<?php foreach ($gallery as $i => $image): ?>
				<li class="<?php echo ($i === 0) ? 'uk-active' : ''; ?>" uk-slideshow-item="<?php echo $i; ?>">
					<a href="#" class="uk-cover-container uk-display-block" style="width: 60px; height: 40px;">
						<?php
						$image = RadicalMartHelperMedia::findThumb($image);
						echo HTMLHelper::image($image, htmlspecialchars($this->product->title), array('uk-cover' => '')); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
