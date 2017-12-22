<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 2:43 PM
 */

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function checkShop(Request $request) {

        $shop = $request->session()->get('shop');
        $token = $request->session()->get('token');

        if(empty($shop) || empty($token)) {

            abort('400', 'Empty shop and token');

        }



    }
}