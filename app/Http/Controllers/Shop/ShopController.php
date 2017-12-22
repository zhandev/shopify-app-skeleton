<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 2:43 PM
 */

namespace App\Http\Controllers\Shop;

use App\Helpers\Shopify\Shopify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function checkShop(Request $request) {

        $shop = $request->session()->get('shop');
        $token = $request->session()->get('token');

//        $shop = 'disana-demo.myshopify.com';
//        $token = '70ac1d2a8329ad6e9795c062a6b708f3';

        if(empty($shop) || empty($token)) {

            abort('400', 'Empty shop and token');

        }

        if(Shop::getShop($shop, $token)) {

            return redirect()->route('createSession')->with([
                'shop' => $shop,
                'token' => $token
            ]);

        }

        $shopify = new Shopify($shop, $token);

        $shopData = $shopify->shop()->single();

        $shopData['token'] = $token;
        $shopData['status'] = true;

        $shop = Shop::create($shopData);

        var_dump($shop);

        return 'ok';

    }
}