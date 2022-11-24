<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'banner' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/articles/images/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $path = 'storage/images/articles/banners/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['banner'] = $name;
        }
        Article::create($data);
        return redirect(route('admin.articles'))->with('success', 'تم إضاقة المقال بنجاح');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'storage/images/articles/imgages/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['image'] = $name;
        }
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $path = 'storage/images/articles/banners/' . date('Y') . '/' . date('m') . '/';
            $name = $path . time() . '-' . $file->getClientOriginalName();
            $file->move($path, $name);
            $data['banner'] = $name;
        }
        $article->update($data);
        return redirect(route('admin.articles'))->with('success', 'تم تعديل المقال بنجاح');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect(route('admin.articles'))->with('success', 'تم حذف المقال بنجاح');
    }
}
