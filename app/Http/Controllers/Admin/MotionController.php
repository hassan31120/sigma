<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motion;
use App\Models\MotionCat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MotionController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $apps = Motion::all();
        return view('admin.motions.index', compact('apps'));
    }

    public function create()
    {
        $cats = MotionCat::all();
        return view('admin.motions.add', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/motions/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $app = Motion::create($data);
        return redirect(route('admin.motions'))->with('success', 'تم إضافة الفيديو بنجاح');
    }

    public function edit($id)
    {
        $cats = MotionCat::all();
        $app = Motion::find($id);
        return view('admin.motions.edit', compact('app', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $app = Motion::find($id);
        $request->validate([
            'link' => 'required',
            'cat_id' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/motions/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $app->update($data);
        return redirect(route('admin.motions'))->with('success', 'تم تعديل الفيديو بنجاح');
    }

    public function destroy($id)
    {
        $app = Motion::find($id);
        $app->delete();
        return redirect(route('admin.motions'))->with('success', 'تم حذف الفيديو بنجاح');
    }
}
