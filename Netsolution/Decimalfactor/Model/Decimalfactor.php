<?php
namespace Netsolution\Decimalfactor\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;

class Decimalfactor extends AbstractModel implements IdentityInterface 
{
    /*
     * Constant CACHE_TAG
     */
	const CACHE_TAG = 'netsolution_decimalfactor_decimalfactor';
	
    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
	protected $_cacheTag = 'netsolution_decimalfactor_decimalfactor';

    /**
     * @var $_eventPrefix
     */
	protected $_eventPrefix = 'netsolution_decimalfactor_decimalfactor';

    /**
     * @return void
     */
	protected function _construct() {
		$this->_init('Netsolution\Decimalfactor\Model\ResourceModel\Decimalfactor');
	}

    /**
     * Get identities
     *
     * @return array
     */
	public function getIdentities(){
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

    /**
     * Get Default Values
     *
     * @return array
     */
	public function getDefaultValues() {
		$values = [];
		return $values;
	}
	
	/**
	 * Save order and calculated total amount in database
	 * @param $order Object,$decimalFactor Decimal
	 * return void
	 **/
	 public function saveDecimalFactor($order,$decimalFactor){
		$finalAmount = $order->getGrandTotal() * $decimalFactor;
		$this->addData([
			"order_id" => $order->getIncrementId(),
			"decimal_factor" =>$decimalFactor,
			"order_value" =>   $order->getGrandTotal(),
			"final_value" => $finalAmount
			]);
		$saveData = $this->save(); 
	 }
}
