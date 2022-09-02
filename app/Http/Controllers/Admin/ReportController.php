<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class ReportController extends BaseController
{
    public function stock()
    {
        $stocks = Stock::all();
        $this->setPageTitle('Current Stocks','Current Stocks');
        return view('backend.stocks.index',compact('stocks'));
    }
}
