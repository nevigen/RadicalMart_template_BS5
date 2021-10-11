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
		<div>
			<div class="border-end">
                <div class="d-flex flex-column justify-content-center">
					<div class="main_image"> <?php echo HTMLHelper::image($gallery[0], htmlspecialchars($this->product->title), array('class' => 'd-block w-100', 'id'=>'main_product_image')); ?> </div>
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
		</div>
</div>


<script>
		function changeImage(element) {
			var main_prodcut_image = document.getElementById('main_product_image');
			main_prodcut_image.src = element.src;
		}
</script>
