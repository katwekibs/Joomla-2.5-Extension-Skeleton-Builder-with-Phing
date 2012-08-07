<?php
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * '@@extensionname@@ master display controller.
 *
 * @package		Joomla.Administrator
 * @subpackage	@@prefix_extension@@
 */
class @@extensionname@@Controller extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			If true, the view output will be cached
	 * @param	array			An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		parent::display();
		return $this;
	}
}
