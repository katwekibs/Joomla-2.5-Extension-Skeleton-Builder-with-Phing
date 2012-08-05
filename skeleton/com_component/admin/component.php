<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	@@com_component@@
 */

defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', '@@com_component@@')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JController::getInstance('@@componentname@@');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
