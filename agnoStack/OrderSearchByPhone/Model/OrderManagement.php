<?php
namespace agnoStack\OrderSearchByPhone\Model;

use agnoStack\OrderSearchByPhone\Api\OrderManagementInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class OrderManagement implements OrderManagementInterface
{
    protected $orderCollectionFactory;

    public function __construct(CollectionFactory $orderCollectionFactory)
    {
        $this->orderCollectionFactory = $orderCollectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderByPhone($phone)
    {
        $collection = $this->orderCollectionFactory->create();
        $collection->addFieldToFilter('shipping_address.telephone', ['eq' => $phone]);

        return $collection->getItems();
    }
}
