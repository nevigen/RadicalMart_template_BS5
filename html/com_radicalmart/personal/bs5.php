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
use Joomla\CMS\Layout\LayoutHelper;

if (Factory::getApplication()->getTemplate() !== 'yootheme' && $this->params->get('uikit', 1))
{
	HTMLHelper::stylesheet('com_radicalmart/uikit.min.css', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/uikit.min.js', array('version' => 'auto', 'relative' => true));
	HTMLHelper::script('com_radicalmart/uikit-icons.min.js', array('version' => 'auto', 'relative' => true));
}

if ($this->params->get('radicalmart_js', 1))
{
	HTMLHelper::script('com_radicalmart/radicalmart.min.js', array('version' => 'auto', 'relative' => true));
}

if ($this->params->get('trigger_js', 1))
{
	HTMLHelper::script('com_radicalmart/trigger.min.js', array('version' => 'auto', 'relative' => true));
}

HTMLHelper::_('jquery.framework');
HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

foreach ($this->form->getFieldsets() as $key => $fieldset)
{
	foreach ($this->form->getFieldset($key) as $field)
	{
		$name  = $field->fieldname;
		$group = $field->group;
		$type  = strtolower($field->type);
		$class = $this->form->getFieldAttribute($name, 'class', '', $group);
		$input = $field->input;
		if ($type === 'text' || $type === 'email') $class .= ' uk-input';
		elseif ($type === 'list' || preg_match('#<select#', $input)) $class .= ' uk-select';
		elseif ($type === 'textarea' || preg_match('#<textarea#', $input)) $class .= ' uk-textarea';
		elseif ($type === 'range') $class .= ' uk-range';

		$this->form->setFieldAttribute($name, 'class', $class, $group);
	}
}
?>
<div id="RadicalMart" class="personal radicalmart-container">
	<div class="card mb-5 mb-xxl-8">
		<div class="card-body pt-9 pb-3">
			<!--begin::Details-->
			<div class="d-flex flex-wrap flex-sm-nowrap mb-6">
				<!--begin: Pic-->
				<div class="me-7 mb-4">
					<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
						<?php echo LayoutHelper::render('components.radicalmart.account.sidebar'); ?>
						<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle h-15px w-15px"></div>
					</div>
				</div>
				<!--end::Pic-->
				<!--begin::Info-->
				<div class="flex-grow-1">
					<!--begin::Title-->
					<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
						<!--begin::User-->
						<div class="d-flex flex-column">
							<div class="d-flex align-items-center mb-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-boldest me-1">ФИО КЛИЕНТА</a>
								<a href="#">
									<!--begin::Svg Icon | path: icons/duotone/Design/Verified.svg-->
									<span class="svg-icon svg-icon-1 svg-icon-primary">
										<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
											<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</a>
							</div>
							<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
								<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
								<!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
								<span class="svg-icon svg-icon-4 me-1">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
								</span>
								<!--end::Svg Icon-->Группа клиента</a>
								<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
								<!--begin::Svg Icon | path: icons/duotone/Map/Marker1.svg-->
								<span class="svg-icon svg-icon-4 me-1">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
								</span>
								<!--end::Svg Icon-->СТрана, Город</a>
								<a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
								<!--begin::Svg Icon | path: icons/duotone/Communication/Mail-at.svg-->
								<span class="svg-icon svg-icon-4 me-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000"></path>
									</svg>
								</span>
								<!--end::Svg Icon-->mail@klient.com</a>
							</div>
						</div>
						<!--end::User-->
					</div>
					<!--end::Title-->
					<!--begin::Stats-->
					<div class="d-flex flex-wrap justify-content-between">
						<!--begin::Info-->
						<div class="d-flex flex-grow-1 pe-8">
							<div class="d-flex flex-wrap">
								<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
									<div class="fs-1 fw-boldest counted" data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">$6,840</div>
									<div class="fw-bold fs-6 text-gray-400">Сумма заказов</div>
								</div>
								<div class="border border-gray-300 border-dashed rounded min-w-125px py-2 px-4 me-6 mb-3">
									<div class="fs-1 fw-boldest counted" data-kt-countup="true" data-kt-countup-value="179">179</div>
									<div class="fw-bold fs-6 text-gray-400">Всего заказов</div>
								</div>
								<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
									<div class="fs-1 fw-boldest counted" data-kt-countup="true" data-kt-countup-value="39">39</div>
									<div class="fw-bold fs-6 text-gray-400">Бонусов</div>
								</div>
							</div>
						</div>
						<!--end::Info-->
					</div>
					<!--end::Stats-->
				</div>
				<!--end::Info-->
			</div>
			<!--end::Details-->
			<div class="separator"></div>
			<div class="">
				<ul class="nav nav-tabs nav-pills nav-fill" id="profile-tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#general" role="tab" aria-controls="general" href="#">Общая информация</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" role="tab" aria-controls="orders"  href="#">Заказы</a>
					</li>
					<li class="nav-item" role="presentation">
						<a  class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery" role="tab" aria-controls="delivery"  href="#">Адреса доставки</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="support-tab" data-bs-toggle="tab" data-bs-target="#support" role="tab" aria-controls="support"  href="#">Обращения</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" role="tab" aria-controls="settings"  href="#" >Настройки</a>
					</li>
				</ul>
				<div id="profile-tabs" class=" tab-content">
					<div id="general"  class="tab-pane fade active" role="tabpanel" aria-labelledby="home-tab">
						раздел общей информации
					</div>
					<div id="orders"  class="tab-pane fade" role="tabpanel" aria-labelledby="orders-tab">
						<?php echo LayoutHelper::render('components.radicalmart.account.sidebar'); ?>
					</div>
					<div id="delivery" class="tab-pane fade" role="tabpanel" aria-labelledby="orders-delivery">
						<form action="<?php echo $this->link; ?>" name="checkoutForm" id="personalForm" method="post"enctype="multipart/form-data" radicalmart-checkout="form"		  class="form-validate ">
							<div class="card-header">
								<h2 class="h2"><?php echo $this->params->get('seo_personal_h1', Text::_('COM_RADICALMART_PERSONAL')); ?></h2>
							</div>
							<div class="card-body">
								<div class="row align-items-start">
									<?php foreach ($this->form->getFieldsets() as $key => $fieldset):
										if ($key === 'hidden') continue; ?>
										<div class="col">
											<fieldset id="personal_<?php echo $key; ?>" class="fieldset">
												<legend class="uk-h4"><?php echo Text::_($fieldset->label); ?></legend>
												<div class="uk-child-width-1-2@s" uk-grid>
													<?php echo $this->form->renderFieldset($key); ?>
												</div>
											</fieldset>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="card-footer text-center">
								<button class="btn btn-primary"><?php echo Text::_('JSAVE'); ?></button>
							</div>
							<div class="uk-hidden">
								<?php echo $this->form->renderFieldset('hidden'); ?>
							</div>
							<input type="hidden" name="option" value="com_radicalmart"/>
							<input type="hidden" name="task" value="personal.save"/>
							<?php echo HTMLHelper::_('form.token'); ?>
						</form>
					</div>
					<div id="support" class="tab-pane fade" role="tabpanel" aria-labelledby="orders-delivery">раздел поддержки</div>
					<div id="settings" class="tab-pane fade" role="tabpanel" aria-labelledby="orders-settings">раздел настроек</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
