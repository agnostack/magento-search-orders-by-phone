<?php
namespace agnoStack\OrderSearchByPhone\Api;

interface OrderManagementInterface
{
  /**
   * GET order by phone
   *
   * @param string $phone
   * @return \Magento\Sales\Api\Data\OrderInterface[]
   */
  public function getOrderByPhone($phone);
}
