<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ShowReports(Request $request)
    {

        if (isset($request->fromDate)) {

            $fromDate = new DateTime($request->fromDate);
            $format_form_date = $fromDate->format('d F Y');
            $toDate = new DateTime($request->toDate);
            $format_to_date = $toDate->format('d F Y');

            $data['reports'] = Order::whereBetween('order_date', [$format_form_date, $format_to_date])->get();

            return view('admin.report.index', $data);
        }

        $data['reports'] = Order::all();


        return view('admin.report.index', $data);
    }
}