<?php
namespace Netsolution\Decimalfactor\Model\ResourceModel\Decimalfactor;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * Field Id
     *
     * @var string
     */
	protected $_idFieldName = 'id';
	
    /**
     * Event prefix
     *
     * @var string
     */
	protected $_eventPrefix = 'netsolution_decimalfactor_decimalfactor_collection';
	
    /**
     * Event Object
     *
     * @var string
     */
	protected $_eventObject = 'decimalfactor_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct() {
		$this->_init('Netsolution\Decimalfactor\Model\Decimalfactor', 'Netsolution\Decimalfactor\Model\ResourceModel\Decimalfactor');
	}
}
