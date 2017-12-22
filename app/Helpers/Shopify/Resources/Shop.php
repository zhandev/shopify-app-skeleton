<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 5:56 PM
 */

namespace App\Helpers\Shopify\Resources;

use App\Helpers\Shopify\Base;

class Shop extends Base
{

    public function single()
    {
        return $this->get('/admin/shop.json')['shop'];
    }

}