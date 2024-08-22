<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\SuperAdmin\FlatController;
use App\Http\Controllers\SuperAdmin\BlockController;
use App\Http\Controllers\User\UserInvoiceController;
use App\Http\Controllers\SuperAdmin\InvoiceController;
use App\Http\Controllers\User\UserComplaintsController;
use App\Http\Controllers\SuperAdmin\FlatAreaController;
use App\Http\Controllers\SuperAdmin\AllotmentsController;
use App\Http\Controllers\SuperAdmin\ComplaintsController;
use App\Http\Controllers\SuperAdmin\Invoice_typeController;
use App\Http\Controllers\SuperAdmin\ComplaintTypeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index']);
Route::get('/get-flats/{blockId}', [HomeController::class, 'getFlats']);
Route::post('flat-login', [HomeController::class, 'login'])->name('flat.login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(BlockController::class)->group(function(){
    Route::get('/superadmin/block', 'index')->name('block.index');
    Route::POST('/block/create', 'store')->name('block.store');
    Route::put('/block/update',  'update')->name('block.update');
    Route::delete('/block/delete/{id}', 'destroy')->name('block.delete');
});

Route::controller(Invoice_typeController::class)->group(function(){
     Route::get('/superadmin/invoce/type', 'index')->name('invoice.type');
     Route::POST('/invoice/type/create', 'store')->name('type.create');
     Route::put('/invoice/type/update',  'update')->name('invoice.update');
     Route::delete('/inovice/type/delete/{id}', 'destroy')->name('invoice.delete');
});

Route::controller(FlatAreaController::class)->group(function(){
    Route::get('/superadmin/flatarea', 'index')->name('flatarea.index');
    Route::get('/superadmin/flatarea/create', 'create')->name('flatarea.create');
    Route::get('/superadmin/flatarea/edit/{id}', 'edit')->name('flatarea.edit');
    Route::POST('/flatarea/create', 'store')->name('flatarea.add');
    Route::PUT('/flatarea/edit/{id}', 'update')->name('flatarea.update');
    Route::delete('/flatarea/delete/{id}', 'destroy')->name('flatarea.delete');

});

Route::controller(FlatController::class)->group(function(){
    Route::get('/superadmin/flat', 'index')->name('flat.index');
    Route::get('/superadmin/flat/create', 'create')->name('flat.create');
    Route::get('/superadmin/flat/edit/{id}', 'edit')->name('flat.edit');
    Route::POST('/flat/create', 'store')->name('flat.add');
    Route::PUT('/flat/edit/{id}', 'update')->name('flat.update');
    Route::delete('/flat/delete/{id}', 'destroy')->name('flat.delete');
    Route::get('/get-flats/{blockId}',  'getFlats');
});

Route::controller(AllotmentsController::class)->group(function(){
    Route::get('/superadmin/allotments','index')->name('allotments.index');
    Route::get('/superadmin/allotments/create','create')->name('allotments.create');
    Route::POST('/allotments', 'store')->name('allotments.store');
    Route::delete('/allotments/delete/{id}', 'destroy')->name('allot.delete');
    Route::get('/superadmin/allotments/edit/{id}', 'edit')->name('allot.edit');
    Route::get('/get-flats/{blockId}',  'getFlats');
});

Route::controller(InvoiceController::class)->group(function(){
    Route::get('/superadmin/invoice', 'index')->name('invoice.index');
    Route::get('/superadmin/invoice/create', 'create')->name('invoice.create');
    Route::POST('/invoice/create', 'store')->name('invoice.store');
    Route::get('invoice/{id}',  'showInvoice')->name('invoice.show');
    Route::get('/additional/invoice/create','AdditionalInvoice')->name('additional.invoive');
    Route::POST('additional/create', 'AdditionalStore')->name('addi_invoice.store');
    Route::get('/additional/invoice/{id}', 'AdditionalInvoiceshow')->name('additional_invoice.show');
});

Route::controller(ComplaintsController::class)->group(function(){
    Route::get('/superadmin/complaints', 'all_complaints')->name('complaints.index');
    Route::PUT('/superadmin/complaint/update/', 'update')->name('complaints.update');
    Route::get('/get-flats/{blockId}',  'getFlats');
    Route::get('/get-owner/{flatId}', 'getOwner');
    Route::get('/superadmin/complaints/unsolved','unsolved')->name('complaints.unsolved');
    Route::get('/superadmin/complaints/inprogress','inprogress')->name('complaints.inprogress');
    Route::get('/superadmin/complaints/resolved','resolved')->name('complaints.resolved');
});

Route::controller(ComplaintTypeController::class)->group(function(){
    Route::get('/superadmin/complaint_type','index')->name('complaint.type');
    Route::POST('/complaint_type/create', 'store')->name('complaint_type.store');
    Route::put('/complaint_type/update',  'update')->name('complaint_type.update');
    Route::delete('/complaint_type/delete/{id}', 'destroy')->name('complaint_type.delete');
});
 
// User Routes

Route::controller(MainController::class)->group(function(){
    Route::get('user/dashboard', 'index')->name('user.dashboard');
});


Route::controller(UserInvoiceController::class)->group(function(){
    Route::get('/user/invoice/view/', 'viewInvoice')->name('view.invoice');
    Route::get('/user/additional/invoice', 'viewadditionalinvoice')->name('view_additional.invoice');
});

Route::controller(UserComplaintsController::class)->group(function(){
    Route::get('/user/complaint/create','create')->name('complaints.create');
    Route::POST('/complaint/create','store')->name('complaints.store');
    Route::get('/user/complaints/action', 'complain_action')->name('action');
    Route::get('/get-flats/{blockId}',  'getFlats');
    Route::get('/get-owner/{flatId}', 'getOwner');

});





require __DIR__.'/auth.php';
