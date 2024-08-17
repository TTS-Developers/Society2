<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Sadmin\Block;
use App\Models\Sadmin\FlatArea;
use App\Models\Sadmin\Inv_type;
use App\Models\Sadmin\InvDetail;
use App\Models\Sadmin\InvMaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $InvMaster = InvMaster::get();
        return view('superadmin.invoice.index', compact('InvMaster'));
    }

    public function create()
    {
        $latestInvoice = DB::table('inv_master')->latest('id')->first();
    
        if ($latestInvoice) {
            // Extract the latest number and increment it
            $latestNumber = (int) substr($latestInvoice->Invoicenumber, 4); // Remove 'INV-' prefix
            $nextNumber = $latestNumber + 1;
        } else {
            // Start from 1 if no invoices exist
            $nextNumber = 1;
        }
        
        // Generate the new invoice number
        $invoiceNumber = 'INV-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    
        // Store the invoice number in session
        session(['invoice_number' => $invoiceNumber]);
    
        $inv_type = Inv_type::get();
        return view('superadmin.invoice.create', compact('inv_type'));
    }
    public function getFlats($blockId)
    {
        $flats = FlatArea::where('block', $blockId)->get();
        return response()->json($flats);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'Invoicenumber' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'Invoice_type.*' => 'required|integer',
            'amount.*' => 'required|numeric'
        ]);

        // Insert invoice master record
        $invoiceMaster = InvMaster::create([
            'Invoicenumber' => $request->Invoicenumber,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        // Insert invoice detail records
        foreach ($request->Invoice_type as $index => $type) {
            InvDetail::create([
                'inv_master_id' => $invoiceMaster->id,
                'Invoice_type' => $type,
                'amount' => $request->amount[$index],
            ]);
        }

        return redirect()->route('invoice.show', ['id' => $invoiceMaster->id])
                         ->with('success', 'Invoice created successfully!');
    }

    public function showInvoice($invoiceId)
    {
        $invoice = DB::table('inv_master')->where('id', $invoiceId)->first();
        $invoiceDetails = DB::table('inv_detail')
        ->join('invoice_type', 'inv_detail.Invoice_type', '=', 'invoice_type.id')
        ->where('inv_detail.inv_master_id', $invoiceId)
        ->select(
            'invoice_type.type_name',
            'inv_detail.id',
            'inv_detail.inv_master_id',
            'inv_detail.Invoice_type',
            'inv_detail.amount',
            'inv_detail.created_at',
            'inv_detail.updated_at'
        )
        ->get();

        $totalAmount = $invoiceDetails->sum('amount');

        return view('superadmin.invoice.invoice', [
            'invoice' => $invoice,
            'invoiceDetails' => $invoiceDetails,
            'totalAmount' => $totalAmount
        ]);
    }

    public function AdditionalInvoice()
    {
        $block = Block::get();
        $inv_type = Inv_type::get();
        return view('superadmin.invoice.additional_invoice', compact('block', 'inv_type'));
    }



    
}
