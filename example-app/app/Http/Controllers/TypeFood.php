<?php

namespace App\Http\Controllers;

use App\Models\TypeFoods;
use Illuminate\Http\Request;

class TypeFood extends Controller
{
    //
    public function index()
    {
        $TypeFoodAll = TypeFoods::all();
        return view(
            'Backend.page.food.typefood.list_type_food',
            compact('TypeFoodAll')
        );
    }

    public function create()
    {
        return view('Backend.page.food.typefood.add_type_food');
    }


    public function store(Request $request)
    {
        TypeFoods::create([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        TypeFoods::where('id_type_food', $id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $GetAllTypeFood = TypeFoods::Where('id_type_food', $id)->first();
        return view('Backend.page.food.typefood.edit_type_food', compact('GetAllTypeFood'));
    }

    public function update(Request $request, $id)
    {
        TypeFoods::Where('id_type_food', $id)->update([
            'name' => $request->name
        ]);
        return redirect("admin/typefood/list");
    }
}