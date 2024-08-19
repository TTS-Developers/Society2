<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Sadmin\Additional_Invoice_Master;
use App\Models\sadmin\Allotment;
use App\Models\Sadmin\InvMaster;
use Illuminate\Support\Facades\Auth;
use user;

use Illuminate\Http\Request;

class UserInvoiceController extends Controller
{
    public function ViewInvoice()
    {
        $inv_data = InvMaster::get();
        return view('user.invoice.view', compact('inv_data'));
    }

    public function viewadditionalinvoice()
    {
       



        if (Auth::guard('flat_guard')->check()) {
            $user = Auth::guard('flat_guard')->user();  // Retrieve the authenticated user
        
            dd( Auth::guard('flat_guard')->user());  // Debugging to check the email
        
            // Fetch the allotment details using the OwnerEmail
            $allot = Allotment::where('OwnerEmail', $user->OwnerEmail)->get();
        
            if ($allot) {
                $flat = $allot->FlatNumber;
                $block = $allot->BlockNumber;
        
                // Fetch additional invoices based on the flat and block numbers
                $additional_invoice = Additional_Invoice_Master::where('flat_id', $flat)
                    ->where('block_id', $block)
                    ->get();
        
                // Return the view with the additional invoices
                return view('user.invoice.additional_invoice', compact('additional_invoice'));
        }
    
   }
    }
}