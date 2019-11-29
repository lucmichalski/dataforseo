<?php


namespace BoolXY\DataForSEO\Api\Merchant\Requests\GoogleShopping;

use BoolXY\DataForSEO\Api\AbstractRequest;
use BoolXY\DataForSEO\Api\RequestInterface;

class GetSellersCompletedTasksRequest extends AbstractRequest implements RequestInterface
{
    protected $method = self::METHOD_GET;

    protected $path = 'merchant_google_shopping_shops_tasks_get';
}
