<?php

namespace App\Exports;

use App\Models\Order;
// use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;

class UserOrderAllExport implements FromQuery
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
        return Order::query()->where('users_id',$this->id);
    }
}
