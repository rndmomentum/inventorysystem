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

        // XS
        $stock_in_xs = Transactions::where('size_id', 'size_61c423fcafb68')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_xs = Transactions::where('size_id', 'size_61c423fcafb68')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_xs = Transactions::where('size_id', 'size_61c423fcafb68')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // S
        $stock_in_s = Transactions::where('size_id', 'size_6191cfdeade32')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_s = Transactions::where('size_id', 'size_6191cfdeade32')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_s = Transactions::where('size_id', 'size_6191cfdeade32')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // M
        $stock_in_m = Transactions::where('size_id', 'size_6191cfe67fe5e')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_m = Transactions::where('size_id', 'size_6191cfe67fe5e')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_m = Transactions::where('size_id', 'size_6191cfe67fe5e')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // L
        $stock_in_l = Transactions::where('size_id', 'size_6191cfecd5dd9')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_l = Transactions::where('size_id', 'size_6191cfecd5dd9')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_l = Transactions::where('size_id', 'size_6191cfecd5dd9')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // XL
        $stock_in_xl = Transactions::where('size_id', 'size_6191cff667f09')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_xl = Transactions::where('size_id', 'size_6191cff667f09')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_xl = Transactions::where('size_id', 'size_6191cff667f09')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // 2XL
        $stock_in_2xl = Transactions::where('size_id', 'size_6191cfd33b7f6')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_2xl = Transactions::where('size_id', 'size_6191cfd33b7f6')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_2xl = Transactions::where('size_id', 'size_6191cfd33b7f6')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // 3XL
        $stock_in_3xl = Transactions::where('size_id', 'size_61c4240846b1f')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_3xl = Transactions::where('size_id', 'size_61c4240846b1f')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_3xl = Transactions::where('size_id', 'size_61c4240846b1f')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        // 4XL
        $stock_in_4xl = Transactions::where('size_id', 'size_61c42410084a3')->where('type_transaction', 'IN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_out_4xl = Transactions::where('size_id', 'size_61c42410084a3')->where('type_transaction', 'OUT')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();
        $stock_return_4xl = Transactions::where('size_id', 'size_61c42410084a3')->where('type_transaction', 'RETURN')->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->count();

        return view('report.shirt', compact('stock_in_xs', 'stock_out_xs', 'stock_return_xs', 'stock_in_s', 'stock_out_s', 'stock_return_s', 'stock_in_m', 'stock_out_m', 'stock_return_m', 'stock_in_l', 'stock_out_l', 'stock_return_l', 'stock_in_xl', 'stock_out_xl', 'stock_return_xl',
        'stock_in_2xl', 'stock_out_2xl', 'stock_return_2xl', 'stock_in_3xl', 'stock_out_3xl', 'stock_return_3xl', 'stock_in_4xl', 'stock_out_4xl', 'stock_return_4xl'));

    }

    public function report_details_daily()
    {
        $count = 1;
        $daily = date('Y-m-d');

        $stocks = Transactions::whereRaw("(created_at >= ? AND created_at <= ?)", [$daily . " 00:00:00", $daily . " 23:59:59"])->get();

        return view('report.details_daily', compact('stocks', 'count'));

    }

    public function report_details_monthly()
    {
        $count = 1;
        $from = date('Y-m-01');
        $to = date('Y-m-31');

        $stocks = Transactions::whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->get();

        return view('report.details_monthly', compact('stocks', 'count'));
    }
}
