<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SizeFoods;


class SizeFood extends Controller
{
    public function index()
    {
        $SizeFoodAll = SizeFoods::all();
        return view(
            'Backend.page.food.sizefood.list_size_food',
            compact('SizeFoodAll')
        );
    }

    public function create()
    {
        return view('Backend.page.food.sizefood.add_size_food');
    }


    public function store(Request $request)
    {
        SizeFoods::create([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        SizeFoods::where('id_size_food', $id)->delete();
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $GetAllSizeFood = SizeFoods::Where('id_size_food', $id)->first();
        return view('Backend.page.food.sizefood.edit_size_food', compact('GetAllSizeFood'));
    }

    public function update(Request $request, $id)
    {
        SizeFoods::Where('id_size_food', $id)->update([
            'name' => $request->name
        ]);
        return redirect("admin/sizefood/list");
    }
}