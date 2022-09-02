<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends BaseController
{
    public function purchase(){
        $this->setPageTitle('Add Product In Stock','Add product in stock');
        $categories = Category::where('status',1)->select('id','name')->get();
        $products = Product::where('status',1)->select('id','name','sku')->get();
        $suppliers = Supplier::where('status',1)->select('id','name')->get();
        return view('backend.stocks.purchase',compact('categories','products','suppliers'));
    }

    public function searchByCategory(Request $request){
        $this->setPageTitle('Add Product In Stock','Add product in stock');
        $categories = Category::where('status',1)->select('id','name')->get();
        $products = Product::where('status',1)->where('category_id',$request->category)->select('id','name','sku')->get();
        $suppliers = Supplier::where('status',1)->select('id','name')->get();
        return view('backend.stocks.purchase',compact('categories','products','suppliers'));
    }

    public function inStock(Request $request){
        $this->validate($request,[
            'supplier_id'  => 'required|integer',
            'po_number'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            foreach ($request->product_id as $key => $product_id) {
                if($request->qty[$key] != null || $request->qty[$key]==0) {
                    $purchase = new Purchase();
                    $purchase->product_id = $request->product_id[$key];
                    $purchase->supplier_id = $request->supplier_id;
                    $purchase->quantity = $request->qty[$key];
                    $purchase->po_number = $request->po_number;
                    $purchase->save();
                    $stock = Stock::where('product_id', $request->product_id[$key])->first();
                    $stock->quantity += $request->qty[$key];
                    $stock->save();
                    DB::commit();
                }
            }
        }catch (\Exception $e){
            DB::rollBack();
           $message = $e->getMessage();

            return $this->responseRedirectBack($message,'error',true,true);
        }
        return $this->responseRedirect('admin.reports.stock','Content Added Successfully','success',false,false);
    }
}
