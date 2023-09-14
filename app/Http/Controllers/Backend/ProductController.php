<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index' , compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrenRecursive')->where('parent_id',null)->get();

        return view('admin.products.create' , compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function generateSKU()
    {
        $number = mt_rand(1000,99999);
        if ($this->checkSKU($number)) {
            return $this->generateSKU();
        }
        return (string)$number;
    }
    public function checkSKU($number)
    {
        return Product::where('sku' , $number)->exists();
    }

    public function makeSlug($string)
    {
        return preg_replace('/\s+/u', '-' , trim($string));
    }
    public function store(Request $request)
    {

        $file = $request->file('photo_id');
        $photo = new Photo();
        $name = time() . $file->getClientOriginalName();
        $photo->path = $name;
        $photo->original_name = $file->getClientOriginalName();
        $photo->user_id = 2;
        $photo->save();


        $newProduct = new Product();
        $newProduct->title = $request->title;
        $newProduct->sku = $this->generateSKU();
        $newProduct->slug = $this->makeSlug($request->input('slug'));
        $newProduct->status = $request->status;
        $newProduct->price = $request->price;
        $newProduct->discount_price = $request->discount_price;
        $newProduct->description = $request->description;
        $newProduct->user_id = 2;

        $newProduct->save();
        $newProduct->categories()->sync($request->categories);


//        $photos = explode(',' , $request->input('photo_id')[0]);
        $newProduct->photos()->sync($photo);

        session()->flash('add_product' , 'محصول جدید با موفقیت ایجاد شد.');
        return redirect('/administrator/products/');

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
        $categories = Category::with('childrenRecursive')->where('parent_id',null)->get();

        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact(['product' , 'categories']));
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
