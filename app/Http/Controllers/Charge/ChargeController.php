<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 11:45 AM
 */

namespace App\Http\Controllers\Charge;

use App\Helpers\Shopify\Shopify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function checkCharge(Request $request)
    {

        $shop = $request->session()->get('shop');
        $token = $request->session()->get('token');

        if(empty($shop) || empty($token)) {

            abort('400', 'Empty shop and token');

        }

        $shopify = new Shopify($shop, $token);

        $chargeTemplate = [
            "name" => "Simple Plan 1",
            "price" => "9.99",
            "return_url" => "https://".$request->getHost()."/install?shop=".$shopify->getShopDomain(),
            "test" => "true"
        ];

        $charges = $shopify->recurringApplicationCharges()->all();

        if($charges->isEmpty()) {

            $createdCharge = $shopify->recurringApplicationCharges()
                ->create($chargeTemplate);

            return redirect($createdCharge['confirmation_url']);

        }

        foreach ($charges->all() as $charge) {

            switch ($charge['status']) {

                case "active":

                    return redirect()->route('checkShop')->with([
                        'shop' => $shop,
                        'token' => $token
                    ]);

                case "pending":

                    return redirect($charge['confirmation_url']);

                    break;
                case "accepted":

                    $shopify->recurringApplicationCharges()->activate($charge);

                    break;
                default:

                    $createdCharge = $shopify->recurringApplicationCharges()
                    ->create($chargeTemplate);

                    return redirect($createdCharge['confirmation_url']);

            }

        }

    }
}