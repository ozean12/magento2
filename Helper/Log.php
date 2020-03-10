<?php

namespace Magento\BilliePaymentMethod\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\BilliePaymentMethod\Model\LogFactory;

class Log extends AbstractHelper
{

    const sandboxMode = 'payment/payafterdelivery/sandbox';

    protected $_billieLogger;
    protected $helper;

    public function __construct(
        \Magento\BilliePaymentMethod\Model\LogFactory  $billieLogger,
        \Magento\BilliePaymentMethod\Helper\Data $helper

    ) {

        $this->_billieLogger = $billieLogger;
        $this->helper = $helper;
    }

    public function billieLog($order, $request, $response)
    {
        $billieLogger = $this->_billieLogger->create();

        $logData = array(

            'store_id' => $order->getStoreId(),
            'order_id' => $order->getId(),
            'reference_id' => $order->getBillieReferenceId(),
            'transaction_tstamp' => time(),
            'created_at' => $order->getCreatedAt(),
            'customer_id' => $order->getCustomerId(),
            'billie_state' => $response->state,
            'mode' => $this->helper->getMode() ? 'sandbox' : 'live',
            'request' => serialize($request)
        );
        $billieLogger->addData($logData);
        $billieLogger->save();

    }

}