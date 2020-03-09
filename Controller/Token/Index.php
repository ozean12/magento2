<?php

namespace Magento\BilliePaymentMethod\Controller\Token;

use Magento\BilliePaymentMethod\Helper\Data;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
class Index extends Action
{

    protected $helper;
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $jsonResultFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
        \Magento\BilliePaymentMethod\Helper\Data $helper
    )
    {
        $this->helper = $helper;
        $this->jsonResultFactory = $jsonResultFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $merchantCustomerId = $this->_request->getParam('merchant_customer_id');

        $client = $this->helper->clientCreate();

        $billieResponse = $client->checkoutSessionCreate($merchantCustomerId);

        $data = ['session_id' => $billieResponse];
        $result = $this->jsonResultFactory->create();
        $result->setData($data);
        return $result;
    }
}