<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraphicCat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GraphicCatController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $cats = GraphicCat::all();
        return view('admin.graphic_cats.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.graphic_cats.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        GraphicCat::create($data);
        return redirect(route('admin.graphiccats'))->with('success', 'تم إضاقة القسم بنجاح');
    }

    public function edit($id)
    {
        $cat = GraphicCat::find($id);
        return view('admin.graphic_cats.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $cat = GraphicCat::find($id);
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $cat->update($data);
        return redirect(route('admin.graphiccats'))->with('success', 'تم تعديل القسم بنجاح');
    }

    public function destroy($id)
    {
        $cat = GraphicCat::find($id);
        $cat->delete();
        return redirect(route('admin.graphiccats'))->with('success', 'تم حذف القسم بنجاح');
    }
}
