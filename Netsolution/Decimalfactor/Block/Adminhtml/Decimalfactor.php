<?php
namespace Netsolution\Decimalfactor\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;

class Decimalfactor extends Container
{
    /**
     * Constructor
     */
	protected function _construct() {
		$this->_controller = 'adminhtml_decimalfactor';
		$this->_blockGroup = 'Netsolution_Decimalfactor';
		$this->_headerText = __('Records');
		parent::_construct();
		$this->removeButton('add'); 
	}
}

