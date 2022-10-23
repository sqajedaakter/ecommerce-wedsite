<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductManage()
    {
        $products = Product::with('brand', 'category')->get();
        return view('backend.home.product.index', compact('products'));
    }
    public function ProductCreate()
    {
        $categoris = Category::get();
        $brands = Brand::get();
        return view('backend.home.product.create', compact('categoris', 'brands'));
    }
    public function ProductStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'price' => 'required',
                'short_description' => 'required',
                'long_description' => 'required',
                'sku' => 'required',
                'qty' => 'required',
                'image' => 'required',

            ]
        );

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
        }
        Product::create([
            'category_id'        => $request->category_id,
            'brand_id'           => $request->brand_id,
            'name'               => $request->name,
            'slug'               => str_replace(' ', '-', strtolower($request->name)),
            'price'              => $request->price,
            'short_description'  => $request->short_description,
            'long_description'   => $request->long_description,
            'sku'                => $request->sku,
            'qty'                => $request->qty,
            'image'              =>  $filename,
        ]);
        return redirect()->back()->with('success', 'Products created successfully.');
    }
    public function ProductEdit($id)
    {
        $product = Product::find($id);
        $brands = Brand::orderBy('id', 'DESC')->get();
        $categoris = Category::orderBy('id', 'DESC')->get();
        return view('backend.home.product.edit', compact('brands', 'product', 'categoris'));
    }
    public function ProductUpdate(Request $request, $id)
    {


        $this->validate(
            $request,
            [
                'name' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'price' => 'required',
                'short_description' => 'required',
                'long_description' => 'required',
                'sku' => 'required',
                'qty' => 'required',

            ]
        );
        $Product = Product::find($id);

        if ($request->file('image')) {

            if ($Product->image && file_exists('public/Image/' . $Product->image)) {
                unlink('public/Image/' . $Product->image);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image/'), $filename);
            $request->image = $filename;
        }
        $Product->update([
            'category_id'        => $request->category_id,
            'brand_id'           => $request->brand_id,
            'name'               => $request->name,
            'slug'               => str_replace(' ', '-', strtolower($request->name)),
            'price'              => $request->price,
            'short_description'  => $request->short_description,
            'long_description'   => $request->long_description,
            'qty'                => $request->qty,
            'sku'                => $request->sku,
            'image'              =>  $filename,
        ]);
        return redirect()->back()->with('success', 'Products update successfully.');
    }
    public function ProductDeleted($id)
    {
        $Product = Product::find($id);

        if (file_exists(public_path('public/Image/' . $Product->image))) {
            unlink(public_path('public/Image/' . $Product->image));
        }
        $Product->delete();
        return redirect()->back()->with('seccess', 'Product Deleted');
    }
}
