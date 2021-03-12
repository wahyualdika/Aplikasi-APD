<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;

class UserOrderExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
     {
         $this->id = $id;
     }

    public function query()
    {
        // dd($this->id);
        return Order::query()->where('id',$this->id);
    }
}
