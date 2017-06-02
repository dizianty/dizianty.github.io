<?php

/**
* Article Open Graph parameters plugin
* @Copyright (C) 2009-2011 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: GK4 1.0 $
**/
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}


defined( '_JEXEC' ) or die();

jimport( 'joomla.plugin.plugin' );
jimport( 'joomla.event.plugin' );
jimport( 'joomla.html.parameter' );
jimport( 'joomla.application.module.helper' );

class plgSystemPlg_GK_OpenGraph extends JPlugin {
	var $_params;
	var $_pluginPath;
	
	function __construct( &$subject ) {
		parent::__construct( $subject );
		$this->_plugin = JPluginHelper::getPlugin( 'system', 'plg_gk_opengraph' );
		$this->_params = new JRegistry( $this->_plugin->params );
		$this->_pluginPath = JPATH_PLUGINS.DS."system".DS."plg_gk_opengraph".DS;
	}
	//Add Gavick menu parameter
	function onContentPrepareForm($form, $data) {		
		if($form->getName()=='com_content.article') {
			JForm::addFormPath($this->_pluginPath);
			$form->loadFile('parameters', false);
		}
	}
}
?>