<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        //  Lấy danh sách sản phẩm
        $get_product=DB::table('product')->get();
        // dd($get_product);
        return view("dashboard.product.show",[
            'get_product' => $get_product
        ]);
    }

    public function add()
    {
        $get_category=DB::table('category')->get();
        return view('dashboard.product.add',[
            'get_category' => $get_category
        ]);
    }

    public function addPost(Request $request)
    {
        if ($request->file('product_img') != '') {
            $path = public_path().'/uploads/images/';


            //upload new file
            $file     =    $request -> file('product_img');
            $filename =    $file    -> getClientOriginalName();
            $file -> move($path, $filename);


            $validate = Validator::make(

                $request->all(),
                [
                    'product_name'        => 'required',
                    'product_description' => 'required',
                    'product_content'     => 'required',
                    'unit_price'          => 'required',

                ], [

                    'product_name.required'          => 'Tên sản phẩm không được bỏ trống',
                    'product_description.required'   => 'Giới thiệu sản phẩm không được để trống',
                    'product_content.required'       => 'Tên không được để trống',
                    'unit_price'                     => 'Giá gốc sản phẩm không được để trống'
                ]

            );


            if ($validate -> fails()) {
                return redirect()->route('dashboard.product.add')->withErrors($validate);
            }

            $get_product_code=DB::table('product')->select('product_code')->get();

            $array_product_code=[];

            foreach ($get_product_code as $key => $value) {
                array_push ($array_product_code, $value->product_code);
            }

            $check_product_code = in_array($request->get('product_code'),$array_product_code);

            if ($check_product_code == true) {
                return redirect()->route('dashboard.product.add')->with('error','Mã sản phẩm này đã tốn tại trong hệ thống!');
            }

            if ($request->get('price_sale') > $request->get('unit_price')) {
                return redirect()->route('dashboard.product.add')->with('error','Giá bán phải nhở hơn hoặc bằng giá gốc!');
            }
            if ($request->get('price_sale') < 0) {
                return redirect()->route('dashboard.product.add')->with('error','Giá bán phải lớn hơn 0!');
            }
            if ($request->get('unit_price') < 0) {
                return redirect()->route('dashboard.product.add')->with('error','Giá gốc phải lớn hơn 0!');
            }

            if ($request->get('product_length') > 100) {
                return redirect()->route('dashboard.product.add')->with('error','Chièu dài sản phẩm phải nhở hơn 100cm!');
            }
            if ($request->get('product_length') < 0) {
                return redirect()->route('dashboard.product.add')->with('error','Chièu dài sản phẩm phải lơn hơn 0!');
            }
            if ($request->get('product_width') > 100) {
                return redirect()->route('dashboard.product.add')->with('error','Chièu rộng sản phẩm phải nhở hơn 100cm!');
            }
            if ($request->get('product_width') < 0) {
                return redirect()->route('dashboard.product.add')->with('error','Chièu rộng sản phẩm phải lớn hơn 0!');
            }
            if ($request->get('product_height') > 100) {
                return redirect()->route('dashboard.product.add')->with('error','Chièu cao sản phẩm phải nhở hơn 100cm!');
            }
            if ($request->get('product_height') < 0) {
                return redirect()->route('dashboard.product.add')->with('error','Chièu cao sản phẩm phải lơn hơn 0!');
            }
            if ($request->get('product_amount') < 0) {
                return redirect()->route('dashboard.product.add')->with('error','Số lượng sản phẩm phải lơn hơn 0!');
            }
            if ($request->get('product_amount') > 500) {
                return redirect()->route('dashboard.product.add')->with('error','Số lượng sản phẩm nhỏ hơn 500!');
            }

            $product = new Product;

            $product -> product_name        = $request -> get('product_name');
            $product -> product_description = $request -> get('product_description');
            $product -> product_content     = $request -> get('product_content');
            $product -> unit_price          = $request -> get('unit_price');
            $product -> price_sale          = $request -> get('price_sale');
            $product -> product_code        = $request -> get('product_code');
            $product -> unit_name           = $request -> get('unit_name');
            $product -> product_length      = $request -> get('product_length');
            $product -> product_width       = $request -> get('product_width');
            $product -> product_height      = $request -> get('product_height');
            $product -> product_img         = $filename;
            $product -> status              = $request -> get('status');
            $product -> category_id         = $request -> get('category_id');
            $product -> product_amount      = $request -> get('product_amount');

            $product -> save();

            if ($product->wasRecentlyCreated == true) {

                return redirect()->route('dashboard.product.add')->with('success', 'Thêm sản phẩm thành công');

            }else{

                return redirect()->route('dashboard.product.add')->with('error','Có lỗi xảy ra');

            }

        }else{

            return redirect()->route('dashboard.product.add')->with('error','Xin vui lòng chọn ảnh đại diện cho sản phẩm');

        }
    }
}