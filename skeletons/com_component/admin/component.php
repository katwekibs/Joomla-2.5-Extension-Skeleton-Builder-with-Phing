<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	@@prefix_extension@@
 */

defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', '@@prefix_extension@@')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JController::getInstance('@@extensionname@@');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
