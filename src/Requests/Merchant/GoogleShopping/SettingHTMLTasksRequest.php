<?php


namespace BoolXY\DataForSEO\Requests\Merchant\GoogleShopping;

use BoolXY\DataForSEO\Requests\AbstractRequest;
use BoolXY\DataForSEO\Requests\RequestInterface;

class SettingHTMLTasksRequest extends AbstractRequest implements RequestInterface
{
    protected $method = self::METHOD_POST;

    protected $path = 'merchant_google_shopping_html_tasks_post';
}
