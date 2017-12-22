<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 11:18 AM
 */

namespace App\Http\Controllers\Auth;

use App\Helpers\Shopify\Shopify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class AuthController extends Controller
{

    public function install(Request $request)
    {
        return redirect(Shopify::getInstallUrl(
            $request->shop,
            env('API_KEY'),
            env('SCOPES'),
            $request->getHost()
        ));
    }

    public function auth(Request $request)
    {
        $shopify = Shopify::auth(
            $request->shop,
            $request->code,
            env('API_KEY'),
            env('API_SECRET_KEY')
        );

        return redirect()->route('checkCharge')->with([
            'shop' => $shopify->getShopDomain(),
            'token' => $shopify->getToken()
        ]);

    }

    public function createSession(Request $request) {

        $shop = $request->session()->get('shop');
        $token = $request->session()->get('token');

        if(Shop::getShop($shop, $token)) {

            session(['shop_auth' => $shop, 'token_auth' => $token]);

            return redirect()->route('dashboard');

        }else {
            abort(302);
        }

    }


}