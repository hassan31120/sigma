<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\App;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.apps.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        ]);
        $data = $request->all();
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
        foreach ($request->file('images') as $image) {
            // $file = $image->file('image');
            $path = 'storage/images/apps/' . date('Y') . '/' . date('m') . '/';
            // $name = $path . time() . '-' . $file->getClientOriginalName();
            // $file->move($path, $name);
            $imageName = $path . $data['title'] . '-image-' . time() . rand(0, 1000) . '.' . $image->extension();
            $image->move($path, $imageName);
            AppImage::create([
                'app_id' => $app->id,
                'image' => $name
            ]);
            dd('hi');
        }
        return redirect(route('admin.apps'))->with('success', 'تم إضافة المشروع بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app = App::find($id);
        return view('admin.apps.edit', compact('app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
