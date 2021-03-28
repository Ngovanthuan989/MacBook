<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;


class CategoryController extends Controller
{
    //
    public function index()
    {

    }

    public function add()
    {
        return view('dashboard.category.add');
    }

    public function addPost(Request $request)
    {
        if (!$request->get('category_name')) {
            return response('Tên danh mục không được để trống!',400);
        }
        if (!$request->get('category_code')) {
            return response('Mã danh mục không được để trống!',400);
        }

        $category = new Categorys;
        $category -> category_name = $request->get('category_name');
        $category -> category_code = $request->get('category_code');
        $category -> status = $request->get('status');
        $category -> save();
        dd($category);
    }
}
