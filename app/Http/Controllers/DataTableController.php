<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use App\Fund;
use App\Inventory;
use App\User;

class DataTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getInventory()
    {
        return datatables()->of(Inventory::all())
            ->addColumn('aksi', function ($inventory) {
                return '<a href="' . route('inventory.edit', ['inventory' => $inventory->id]) . '" class="btn btn-warning btn-sm mr-2 mb-2 btn-block">Edit</a>'
                    . '<button type="button" class="btn btn-danger btn-sm btn-delete btn-block" data-remote="' . route('inventory.destroy', ['inventory' => $inventory->id]) . '">Delete</button>';
            })
            ->addColumn('category', function($inventory) {
                return $inventory->Category();
            })
            ->addColumn('fund', function($inventory) {
                return $inventory->Fund();
            })
            ->addColumn('date', function($inventory) {
                return substr($inventory->buy_date, 0, 16);
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function getCategory()
    {
        return datatables()->of(Category::all())
            ->addColumn('aksi', function ($category) {
                return '<a href="' . route('category.edit', ['category' => $category->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
                    . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('category.destroy', ['category' => $category->id]) . '">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function getFund()
    {
        return datatables()->of(Fund::all())
            ->addColumn('aksi', function ($fund) {
                return '<a href="' . route('fund.edit', ['fund' => $fund->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
                    . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('fund.destroy', ['fund' => $fund->id]) . '">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }
}
