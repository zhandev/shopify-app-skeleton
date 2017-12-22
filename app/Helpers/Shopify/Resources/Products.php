<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 12:03 PM
 */

namespace App\Helpers\Shopify\Resources;

use App\Helpers\Shopify\Base;

class Products extends Base
{
    /**
     * Get all products
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        $products = $this->get("/admin/products.json")["products"];

        return collect($products);
    }
}