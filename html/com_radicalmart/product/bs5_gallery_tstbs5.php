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

<style>
.thumbnail_images ul {
    list-style: none;
    justify-content: center;
    display: flex;
    align-items: center;
    margin-top: 10px
}

.thumbnail_images ul li {
    margin: 5px;
    padding: 10px;
    border: 2px solid #eee;
    cursor: pointer;
    transition: all 0.5s
}

.thumbnail_images ul li:hover {
    border: 2px solid #000
}

.main_image {
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom: 1px solid #eee;
    height: 400px;
    width: 100%;
    overflow: hidden
}

</style>
<div class="rm-product-card-gallery p-3">
			<div class="col-md-6 border-end">
                <div class="d-flex flex-column justify-content-center">
					<div class="main_image"> <?php echo HTMLHelper::image($image, htmlspecialchars($this->product->title), array('class' => 'd-block w-100', 'id'=>'main_product_image')); ?> </div>
                    <div class="thumbnail_images">
                        <ul id="thumbnail">
							<?php foreach ($gallery as $image): ?>
									 <li>
									  <?php echo HTMLHelper::image($image, htmlspecialchars($this->product->title), array('onclick' => 'changeImage(this)', 'class'=>'carousel-thumbs-item')); ?>
									 </li>
								<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>



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


<script>
		function changeImage(element) {

		var main_prodcut_image = document.getElementById('main_product_image');
		main_prodcut_image.src = element.src;

		}
</script>
