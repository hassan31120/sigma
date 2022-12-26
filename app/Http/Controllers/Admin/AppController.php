<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\AppCat;
use App\Models\AppImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $apps = App::all();
        return view('admin.apps.index', compact('apps'));
    }

    public function create()
    {
        $cats = AppCat::all();
        return view('admin.apps.add', compact('cats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required',
            'price' => 'required|numeric',
            'b_head' => 'required',
            'b_body' => 'required',
            'b_image' => 'required',
            'pages' => 'required|numeric',
            'downlaods' => 'required|numeric',
            'customers' => 'required|numeric',
            'country' => 'required|numeric',
            'c_name' => 'required',
            'c_body' => 'required',
            'c_logo' => 'required',
            'cat_id' => 'required',
        ]);
        $data = $request->except('images');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('b_image')) {
            $file = $request->file('b_image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['b_image'] = $name;
        }
        if ($request->hasFile('c_logo')) {
            $file = $request->file('c_logo');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['c_logo'] = $name;
        }
        $app = App::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $file = $image;
                $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                AppImage::create([
                    'app_id' => $app->id,
                    'image' => $name
                ]);
            }
        }
        return redirect(route('admin.apps'))->with('success', 'تم إضافة المشروع بنجاح');
    }

    public function edit($id)
    {
        $cats = AppCat::all();
        $app = App::find($id);
        return view('admin.apps.edit', compact('app', 'cats'));
    }

    public function update(Request $request, $id)
    {
        $app = App::find($id);
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            // 'image' => 'required',
            'price' => 'required|numeric',
            'b_head' => 'required',
            'b_body' => 'required',
            // 'b_image' => 'required',
            'pages' => 'required|numeric',
            'downlaods' => 'required|numeric',
            'customers' => 'required|numeric',
            'country' => 'required|numeric',
            'c_name' => 'required',
            'c_body' => 'required',
            // 'c_logo' => 'required',
            'cat_id' => 'required',
        ]);
        $data = $request->except('images');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('b_image')) {
            $file = $request->file('b_image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['b_image'] = $name;
        }
        if ($request->hasFile('c_logo')) {
            $file = $request->file('c_logo');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['c_logo'] = $name;
        }
        $app->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $file = $image;
                $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
                $name = $path . time() . '-' . $file->getClientOriginalName();
                $file->move($path, $name);
                AppImage::create([
                    'app_id' => $app->id,
                    'image' => $name
                ]);
            }
        }
        return redirect(route('admin.apps'))->with('success', 'تم تعديل المشروع بنجاح');
    }

    public function destroy($id)
    {
        $app = App::find($id);
        $app->delete();
        return redirect(route('admin.apps'))->with('success', 'تم حذف المشروع بنجاح');
    }
}
