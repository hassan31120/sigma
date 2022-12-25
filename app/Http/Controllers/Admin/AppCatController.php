<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppCat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppCatController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $cats = AppCat::all();
        return view('admin.app_cats.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.app_cats.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        AppCat::create($data);
        return redirect(route('admin.Appcats'))->with('success', 'تم إضاقة القسم بنجاح');
    }

    public function edit($id)
    {
        $cat = AppCat::find($id);
        return view('admin.app_cats.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $cat = AppCat::find($id);
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $cat->update($data);
        return redirect(route('admin.Appcats'))->with('success', 'تم تعديل القسم بنجاح');
    }

    public function destroy($id)
    {
        $cat = AppCat::find($id);
        $cat->delete();
        return redirect(route('admin.Appcats'))->with('success', 'تم حذف القسم بنجاح');
    }
}
