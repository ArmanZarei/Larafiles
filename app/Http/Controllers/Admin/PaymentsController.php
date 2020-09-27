<?php

namespace App\Http\Controllers\Admin;

use App\Model\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public function list()
    {
        $payments = Payment::all();
        return view('admin.payments.list',compact('payments'))->with([
            'panel_title' => 'Payments List',
            'panel_icon' => 'fad fa-credit-card'
        ]);
    }

    public function delete($payment_id)
    {
        $payment = Payment::find(intval($payment_id));
        if ($payment && $payment instanceof Payment){
            $payment->delete();
            return redirect()->route('admin.payments.list')->with([
                'success' => true,
                'message' => 'Payment with id (' . $payment_id . ') Successfully deleted.'
            ]);
        }

        return redirect()->route('admin.payments.list')->with([
            'error' => true,
            'message' => 'Invalid Payment ID (' . $payment_id . ').'
        ]);
    }
}
