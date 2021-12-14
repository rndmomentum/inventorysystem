<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Transactions;
use App\Models\StockInReport;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $daily = date('Y-m-d');
        $monthly = date('m-Y');

        $from = date('Y-m-01');
        $to = date('Y-m-31');

        $stock_in = Transactions::where('type_transaction', 'IN')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count();
        $stock_in_report_monthly = StockInReport::whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count();
        $stock_out = Transactions::where('type_transaction', 'OUT')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count();
        $stock_return = Transactions::where('type_transaction', 'RETURN')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count();

        $stock_in_date = Transactions::where('type_transaction', 'IN')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_in_report_daily = StockInReport::whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_date = Transactions::where('type_transaction', 'OUT')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_date = Transactions::where('type_transaction', 'RETURN')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        return view('report.index', compact('stock_in', 'stock_in_report_daily', 'stock_in_report_monthly','stock_out', 'stock_return', 'stock_in_date', 'stock_out_date', 'stock_return_date', 'daily', 'monthly'));
    }

    public function shirt()
    {
        $daily = date('Y-m-d');
        $monthly = date('m-Y');

        $from = date('Y-m-01');
        $to = date('Y-m-31');

        $information = Information::where('information_type', 'SIZE')->get();
        $stock_in = Transactions::where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->get();
        $stock_out = Transactions::where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count();
        $stock_return = Transactions::where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count();

        // $stock_in_date = Transactions::where('type_transaction', 'IN')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        // $stock_out_date = Transactions::where('type_transaction', 'OUT')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        // $stock_return_date = Transactions::where('type_transaction', 'RETURN')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        return view('report.shirt', compact('stock_in', 'stock_out', 'stock_return', 'daily', 'monthly', 'information', 'from' , 'to'));

    }
}
