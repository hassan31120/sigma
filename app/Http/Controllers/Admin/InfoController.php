<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::find(1);
        return view('admin.info.index', compact('info'));
    }

    public function edit()
    {
        $info = Info::find(1);
        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request)
    {
        $info = Info::find(1);
        $request->validate([
            'views' => 'required',
            'customers' => 'required',
            'employees' => 'required',
            'projects' => 'required',
            'number' => 'required',
            'email' => 'required',
        ]);
        $info->update($request->all());
        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }
}
