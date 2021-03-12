<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Exports\UserOrderExport;
use App\Exports\UserOrderAllExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function exportOrderAll()
    {
      return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    public function exportUserOrder($id)
    {
      return Excel::download(new UserOrderExport($id),'user_order.xlsx');
    }

    public function exportAllUserOrder($id){
      return Excel::download(new UserOrderAllExport($id),'user_all_order.xlsx');
    }
}
