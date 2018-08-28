<?php
 
namespace Netsolution\Decimalfactor\Helper;
 
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const DECIMAL_FACTOR_ENABLED = 'netsolution/general/enabled';
    const DECIMAL_FACTOR_VALUE = 'netsolution/general/decimalfactor_value';
 
    /**
     * check if decimal factor option is enabled
     * @return bool
     */
    public function moduleStatus() {
        return $this->scopeConfig->getValue(self::DECIMAL_FACTOR_ENABLED, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * get decimal factor value stored in admin configuration
     * @return decimal
     */
    public function decimalFactorValue() {
        return $this->scopeConfig->getValue(self::DECIMAL_FACTOR_VALUE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}