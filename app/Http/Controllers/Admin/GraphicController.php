<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Graphic;
use App\Models\GraphicCat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GraphicController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $apps = Graphic::all();
        return view('admin.graphics.index', compact('apps'));
    }

    public function create()
    {
        $cats = GraphicCat::all();
        return view('admin.graphics.add', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/graphics/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $app = Graphic::create($data);
        return redirect(route('admin.graphics'))->with('success', 'تم إضافة التصميم بنجاح');
    }

    public function edit($id)
    {
        $cats = GraphicCat::all();
        $app = Graphic::find($id);
        return view('admin.graphics.edit', compact('app', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $app = Graphic::find($id);
        $request->validate([
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/graphics/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $app->update($data);
        return redirect(route('admin.graphics'))->with('success', 'تم تعديل التصميم بنجاح');
    }

    public function destroy($id)
    {
        $app = Graphic::find($id);
        $app->delete();
        return redirect(route('admin.graphics'))->with('success', 'تم حذف التصميم بنجاح');
    }
}
