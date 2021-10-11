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
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;

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

HTMLHelper::script('com_radicalmart/settings.min.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::script('com_radicalmart/axios.min.js', array('version' => 'auto', 'relative' => true));
Factory::getDocument()->addScriptOptions('radicalmart_settings', array(
	'id'         => $this->item->id,
	'controller' => Route::link('site', RadicalMartHelperRoute::getSettingsRoute(), false),
	'CSRF'       => Session::getFormToken()
));

foreach ($this->form->getFieldsets() as $key => $fieldset)
{
	foreach ($this->form->getFieldset($key) as $field)
	{
		$name  = $field->fieldname;
		$group = $field->group;
		$type  = strtolower($field->type);
		$class = $this->form->getFieldAttribute($name, 'class', '', $group);
		$input = $field->input;
		if ($type === 'text' || $type === 'email' || $type === 'password') $class .= ' uk-input uk-form-width-large';
		elseif ($type === 'list' || preg_match('#<select#', $input)) $class .= ' uk-select';
		elseif ($type === 'textarea' || preg_match('#<textarea#', $input)) $class .= ' uk-textarea';
		elseif ($type === 'range') $class .= ' uk-range';

		$this->form->setFieldAttribute($name, 'class', $class, $group);
	}
}
?>
<div id="RadicalMart" class="settings radicalmart-container">
	<div class="uk-child-width-expand@m uk-grid-medium" uk-grid>
		<div class="uk-width-1-4@m">
			<?php echo LayoutHelper::render('components.radicalmart.account.sidebar'); ?>
		</div>
		<div>
			<div class="uk-card uk-card-default uk-card-small">
				<div class="uk-card-header">
					<h1 class="uk-h2">
						<?php echo $this->params->get('seo_settings_h1', Text::_('COM_RADICALMART_SETTINGS')); ?>
					</h1>
				</div>
				<div class="uk-card-body">
					<?php foreach ($this->form->getFieldsets() as $key => $fieldset): ?>
						<fieldset id="personal_<?php echo $key; ?>" radicalmart-settings="container"
								  class="uk-fieldset uk-margin-medium">
							<legend class="uk-h4 uk-margin-small"><?php echo Text::_($fieldset->label); ?></legend>
							<div radicalmart-settings="error" class="uk-alert uk-alert-danger uk-margin-small-top"
								 style="display: none"></div>
							<div radicalmart-settings="success" class="uk-alert uk-alert-success uk-margin-small-top"
								 style="display: none"></div>
							<div>
								<?php echo str_replace('readonly', 'disabled readonly',
									$this->form->renderFieldset($key)); ?>
							</div>
							<div>
								<button onclick="RadicalMartSettingsUpdate_<?php echo $key; ?>(this)"
										class="uk-button uk-button-primary">
									<?php echo Text::_('COM_RADICALMART_UPDATE'); ?>
								</button>
							</div>
						</fieldset>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
