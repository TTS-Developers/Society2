<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sadmin\InvMaster;
use Illuminate\Http\Request;

class UserInvoiceController extends Controller
{
    public function ViewInvoice()
    {
        $inv_data = InvMaster::get();
        return view('user.invoice.view', compact('inv_data'));
    }
}
