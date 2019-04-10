<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Product::all();
        return view('backend.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();
        return view('backend.product.create',$data);
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
          'name' => 'required|max:100',
          'price' => 'required|integer',
          'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
          $path = 'images';
          $file = $request->featured_image;
          $extension = $file->getClientOriginalExtension();
          $fileName = rand(1111,9999).".".$extension;
          $file->move($path, $fileName);
          $featured_image = $fileName;
        }

        $input['id_category'] = $request->id_category;
        $input['name'] = $request->name;
        $input['price'] = $request->price;
        $input['featured_image'] = $featured_image;
        $input['size'] = $request->size;
        $input['quantity'] = $request->quantity;
        $input['description'] = $request->description;
        // dd($input);
        Product::create($input);
        return redirect()->route('product.index')->with('Success','Create Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data['product'] = Product::findOrFail($id);
      // dd($data);
      return view('backend.product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $data['product'] = Product::find($id);
          $data['category'] = Category::all();
          return view('backend.product.edit',$data);
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
      $product = Product::findOrFail($id);

      if ($request->file('featured_image') == "") {
        $product->featured_image = $product->featured_image;
      }else{
        $path = 'images';
        $file = $request->file('featured_image');
        $ext = $file->getClientOriginalExtension();
        $fileName = rand(1111,9999).".".$ext;
        $file->move($path,$fileName);
        $product->featured_image = $fileName;
      }

      $product->id_category = $request->id_category;
      $product->name = $request->name;
      $product->price = $request->price;
      $product->size = $request->size;
      $product->quantity = $request->quantity;
      $product->description = $request->description;
      $product->update();

      return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
