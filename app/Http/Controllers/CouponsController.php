<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use LacosFofos\Models\Coupon;

class CouponsController extends Controller
{
    public function addCoupon(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $coupon = new Coupon;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->status = $data['status'];
            $coupon->save();
            return redirect()->action('CouponsController@viewCoupons')->with('flash_message_success', 'O cupom foi adicionado com sucesso.');
        }
        return view('admin.coupons.add_coupon');
    }

    public function viewCoupons()
    {
        $coupons = Coupon::get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }
}
