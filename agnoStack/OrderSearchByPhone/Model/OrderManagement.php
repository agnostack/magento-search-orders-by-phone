<?php
namespace agnoStack\OrderSearchByPhone\Model;

use agnoStack\OrderSearchByPhone\Api\OrderManagementInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Magento\Sales\Model\ResourceModel\Order\Address\CollectionFactory as AddressCollectionFactory;

class OrderManagement implements OrderManagementInterface
{
  protected $orderCollectionFactory;
  protected $addressCollectionFactory;

  public function __construct(
    OrderCollectionFactory $orderCollectionFactory,
    AddressCollectionFactory $addressCollectionFactory
  )
  {
    $this->orderCollectionFactory = $orderCollectionFactory;
    $this->addressCollectionFactory = $addressCollectionFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function getOrderByPhone($phone)
  {
    $addressCollection = $this->addressCollectionFactory->create();
    $addressCollection->addFieldToFilter('telephone', ['eq' => $phone]);

    $orderIds = $addressCollection->getColumnValues('parent_id');

    $collection = $this->orderCollectionFactory->create();
    $collection->addFieldToFilter('entity_id', ['in' => $orderIds]);

    return $collection->getItems();
  }
}
