<?php

require_once "phing/tasks/system/PropertyTask.php";

class ExtensionPropertyTask extends PropertyTask {

	protected $extension = null;
	private $_prefix;
	
    /**
     * The setter for the attribute "extension"
     */
    public function setExtension($str) 
    {
        $this->extension = $str;
    }
	
    /**
     * Setting the joomla extension prefix according to the extension attribute
     */	
	private function setTypePrefix()
	{
		switch ($this->extension)
		{
			case 'module':	$this->_prefix = 'mod_'; break; 
			case 'plugin':	$this->_prefix = 'plg_'; break; 
			case 'template':	$this->_prefix = 'tpl_'; break;
			default: $this->_prefix = 'com_'; break;
		}
	}
	
    /**
     * add a name value pair to the project property set
     * @param string $name name of property
     * @param string $value value to set
     */
    protected function addProperty($name, $value) 
    {
		$this->setTypePrefix();
		
		$prefix_extension = $this->_prefix.preg_replace('/\ /', '', strtolower($value));
		$prefix_extension_uppercase = strtoupper($this->_prefix).preg_replace('/\ /', '',strtoupper($value));
		$extensionhumanname = $value;
		$extensionname = preg_replace('/\ /', '', ucwords(strtolower($value)));
		$extensionfilename = preg_replace('/\ /', '', strtolower($value));
		
        if ($this->userProperty) 
        {
            if ($this->project->getUserProperty($name) === null || $this->override) 
            {
                $this->project->setInheritedProperty($name, $value);
				// Joomla prefix
                $this->project->setInheritedProperty('prefix', $this->_prefix);
				// Joomla prefix_extension style
                $this->project->setInheritedProperty('prefix_'.$name, $prefix_extension);
				// Uppercase style for language files
                $this->project->setInheritedProperty('prefix_'.$name.'_uppercase', $prefix_extension_uppercase);								
                // Human read style
                $this->project->setInheritedProperty($name.'humanname', $extensionhumanname);
				// CamelCase style
                $this->project->setInheritedProperty($name.'name', $extensionname);				
				// Extension filename style
                $this->project->setInheritedProperty($name.'filename', $extensionfilename);					
            }
            else 
            {
                $this->log("Override ignored for " . $name, Project::MSG_VERBOSE);
            }
        } 
        else 
        {
            if ($this->override) 
            {
                $this->project->setProperty($name, $value);
				// Joomla prefix
                $this->project->setProperty('prefix', $this->_prefix);				
				// Joomla prefix_extension style
                $this->project->setProperty('prefix_'.$name, $prefix_extension);
				// Uppercase style for language files
                $this->project->setProperty('prefix_'.$name.'_uppercase', $prefix_extension_uppercase);								
                // Human read style
                $this->project->setProperty($name.'humanname', $extensionhumanname);
				// CamelCase style
                $this->project->setProperty($name.'name', $extensionname);				
				// Extension filename style
                $this->project->setProperty($name.'filename', $extensionfilename);				
            }
            else
            {
                $this->project->setNewProperty($name, $value);
				// Joomla prefix
                $this->project->setNewProperty('prefix', $this->_prefix);								
				// Joomla prefix_extension style
                $this->project->setNewProperty('prefix_'.$name, $prefix_extension);
				// Uppercase style for language files
                $this->project->setNewProperty('prefix_'.$name.'_uppercase', $prefix_extension_uppercase);								
                // Human read style
                $this->project->setNewProperty($name.'humanname', $extensionhumanname);
				// CamelCase style
                $this->project->setNewProperty($name.'name', $extensionname);				
				// Extension filename style
                $this->project->setNewProperty($name.'filename', $extensionfilename);				
            }
        }
    }

}

?>