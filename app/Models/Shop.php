<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 6:00 PM
 */

namespace App\Models;

class Shop extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    protected $fillable = [
        "id",
        "name",
        "email",
        "domain",
        "created_at",
        "province",
        "country",
        "address1",
        "zip",
        "city",
        "customer_email",
        "phone",
        "updated_at",
        "country_code",
        "country_name",
        "currency",
        "shop_owner",
        "money_format",
        "plan_name",
        "plan_display_name",
        "myshopify_domain",
        "money_in_emails_format",
        "token",
        "status"
    ];

    public static function getShop($shop, $token) {

        $shop = self::where('myshopify_domain', $shop)
            ->where('token', $token)
            ->get()
            ->toArray();

        return $shop;

    }

}