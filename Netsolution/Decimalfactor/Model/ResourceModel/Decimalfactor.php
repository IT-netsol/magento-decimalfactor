<?php
namespace Netsolution\Decimalfactor\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;

class Decimalfactor extends AbstractDb
{
	/**
	 * @return void
	 */
	public function __construct(Context $context) {
		parent::__construct($context);
	}

	/**
	 * @return void
	 */
	protected function _construct() {
		$this->_init('netsolution_decimalfactor', 'id');
	}
}
