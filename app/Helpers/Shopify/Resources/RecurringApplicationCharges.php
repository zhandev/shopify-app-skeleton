<?php
/**
 * User: Zhanybek Seitaliev
 * Email: zhandev312@gmail.com
 * Date: 12/22/17
 * Time: 11:51 AM
 */

namespace App\Helpers\Shopify\Resources;

use App\Helpers\Shopify\Base;

class RecurringApplicationCharges extends Base
{

    /**
     * Get all recurring application charges
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return collect(
            $this->get("/admin/recurring_application_charges.json")["recurring_application_charges"]
        );
    }

    /**
     * Create charge
     *
     * @param $charge
     * @return array
     */
    public function create($charge)
    {
        return $this->post("/admin/recurring_application_charges.json", [
            "recurring_application_charge" => $charge
        ])["recurring_application_charge"];

    }

    public function activate($charge)
    {
        $chargeId = $charge['id'];

        $charge["status"] = "active";

        return $this->post("/admin/recurring_application_charges/$chargeId/activate.json", [
            "recurring_application_charge" => $charge
        ])["recurring_application_charge"];

    }
}