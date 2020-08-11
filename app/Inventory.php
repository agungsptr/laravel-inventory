<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['name', 'brand', 'amount', 'unit', 'machine_number', 'buy_date', 'location', 'condition', 'status', 'price', 'pj', 'category_id', 'fund_id'];

    public function Category()
    {
        $ctg = Category::find($this->category_id);
        return $ctg->name;
    }

    public function Fund()
    {
        $fund = Fund::find($this->fund_id);
        return $fund->name;
    }
}
