<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\SizeFoods;
use App\Models\TypeFoods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class food extends Controller
{
    //
    public function index()
    {
        $FoodsAll = Foods::all();
        $SizeAll = SizeFoods::all();
        $TypeAll = TypeFoods::all();
        return view(
            'Backend.page.food.list_food',
            compact('FoodsAll', 'SizeAll', 'TypeAll')
        );
    }

    public function create()
    {
        $SizeAll = SizeFoods::all();
        $TypeAll = TypeFoods::all();
        return view('Backend.page.food.add_food', compact('SizeAll', 'TypeAll'));
    }

    public function store(Request $request)
    {
        Foods::create([
            'name' => $request->name,
            'price' => $request->price,
            'type_food_id' => $request->typefood,
            'size_food_id' => $request->sizefood,
            'img' => "none.png",
        ]);
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        Foods::where('id_food', $id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $SizeAll = SizeFoods::all();
        $TypeAll = TypeFoods::all();
        $GetAllFood = Foods::Where('id_food', $id)->first();
        return view('Backend.page.food.edit_food', compact('GetAllFood', 'SizeAll', 'TypeAll'));
    }

    public function update(Request $request, $id)
    {
        Foods::Where('id_food', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'type_food_id' => $request->typefood,
            'size_food_id' => $request->sizefood,
            'img' => "none.png",
        ]);
        return redirect("admin/food/list");
    }
}