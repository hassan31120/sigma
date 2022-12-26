<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MotionCat;
use Illuminate\Http\Request;
use Carbon\Carbon;


class MotionCatController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $cats = MotionCat::all();
        return view('admin.motion_cats.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.motion_cats.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        MotionCat::create($data);
        return redirect(route('admin.motioncats'))->with('success', 'تم إضاقة القسم بنجاح');
    }

    public function edit($id)
    {
        $cat = MotionCat::find($id);
        return view('admin.motion_cats.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $cat = MotionCat::find($id);
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $cat->update($data);
        return redirect(route('admin.motioncats'))->with('success', 'تم تعديل القسم بنجاح');
    }

    public function destroy($id)
    {
        $cat = MotionCat::find($id);
        $cat->delete();
        return redirect(route('admin.motioncats'))->with('success', 'تم حذف القسم بنجاح');
    }
}
