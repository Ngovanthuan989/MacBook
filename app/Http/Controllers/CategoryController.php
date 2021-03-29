<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
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

        $get_category=DB::table('category')->select('category_code')->get();
        $array_code=[];
        foreach ($get_category as $key => $value) {
            array_push ($array_code, $value->category_code);
        }

        $check_code_category = in_array($request->get('category_code'),$array_code);

        if ($check_code_category==true) {
            return response('Mã danh mục này đã tồn tại!',400);
        }

        $category = new Categorys;
        $category -> category_name = $request->get('category_name');
        $category -> category_code = $request->get('category_code');
        $category -> status = $request->get('status');
        $category -> save();

        if ($category->wasRecentlyCreated == true) {
            return response('Thêm danh mục thành công!');
        }else{
            return response('Thêm danh mục không thành công!',400);
        }
    }
}
