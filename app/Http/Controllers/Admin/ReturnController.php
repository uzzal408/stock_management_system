<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ReturnProduct;
use App\Models\Stock;
use App\Models\Stockout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends BaseController
{
    public function index(){
        $this->setPageTitle('Return','Product returns');
        $categories = Category::where('status',1)->select('id','name')->get();
        $products = Product::where('status',1)->select('id','name','sku')->get();
        $customers = Customer::where('status',1)->select('id','name')->get();
        return view('backend.stocks.return',compact('categories','products','customers'));
    }

    public function searchByCategory(Request $request){
        $this->setPageTitle('Return','Product return');
        $categories = Category::where('status',1)->select('id','name')->get();
        $products = Product::where('status',1)->where('category_id',$request->category)->select('id','name','sku')->get();
        $customers = Customer::where('status',1)->select('id','name')->get();
        return view('backend.stocks.return',compact('categories','products','customers'));
    }

    public function returnItem(Request $request){
        $this->validate($request,[
            'customer_id'  => 'required|integer',
            'so_number'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            foreach ($request->product_id as $key => $product_id) {
                if($request->qty[$key] != null || $request->qty[$key]==0) {
                    $stock = Stock::where('product_id', $request->product_id[$key])->first();
                    $re = new ReturnProduct();
                    $re->product_id = $request->product_id[$key];
                    $re->customer_id = $request->customer_id;
                    $re->quantity = $request->qty[$key];
                    $re->so_number = $request->so_number;
                    $re->save();
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
