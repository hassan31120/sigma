<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'desc' => 'required',
            'price' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/services/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        Service::create($data);
        return redirect(route('admin.services'))->with('success', 'تم إضافة الخدمة بنجاح');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/services/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        $service->update($data);
        return redirect(route('admin.services'))->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect(route('admin.services'))->with('success', 'تم حذف الخدمة بنجاح');
    }
}
