<?php

namespace Netsolution\Decimalfactor\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Netsolution\Decimalfactor\Helper\Data;
use Netsolution\Decimalfactor\Model\Decimalfactor;
use Psr\Log\LoggerInterface;

class Updatedecfactordata implements ObserverInterface
{
    /**
     * @var decimalfactor
     */
    protected $decimalfactor;
    
    /**
     * @var data
     */
    protected $data;
    
    /**
     * @var logger
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     * @param Data $data
     * @param DecimalfactorFactory $decimalfactor
     */
    public function __construct(LoggerInterface $logger , Data $data , Decimalfactor $decimalfactor) {
        $this->logger = $logger;
        $this->helper = $data;
        $this->decimalfactor = $decimalfactor;
    }

    /**
	 * calculate value based on decimal factor
	 * @param \Magento\Framework\Event\Observer $observer
	 * @return void
	 */
    public function execute(Observer $observer) {
        if($this->helper->moduleStatus()) {
			try {
				$decimalFactor = $this->helper->decimalFactorValue();
				$invoice = $observer->getEvent()->getInvoice();
				$order = $invoice->getOrder();
				if($order->getBaseTotalDue() == 0 && is_numeric($decimalFactor)){
					$decimalFactorModel = $this->decimalfactor->saveDecimalFactor($order,$decimalFactor); 
				}
			} catch (\Exception $e){
				$this->logger->error($e->getMessage());
			}
        }  
    }
}
