<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
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
        $product = ProductModel::all();
        return view('product/index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validasi
         $request->validate([
            'nama' => 'required|min:5',
            'price' => 'required'
        ],
        [
            'nama.required' => 'jangan kosongkan nama anda',
            'nama.min' => 'minimal karakter 5',
            'price.required' => 'harga tidak boleh kosong',
        ]
    
    );
        //return $request;
        ProductModel::create([
            'name' => $request->nama,
            'price' => $request->price
        ]);
        return redirect('/product')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        return view('product/edit', compact('productModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $productModel)
    {
          //validasi
          $request->validate([
            'nama' => 'required|min:5',
            'price' => 'required'
        ],
        [
            'nama.required' => 'jangan kosongkan nama anda',
            'nama.min' => 'minimal karakter 5',
            'price.required' => 'harga tidak boleh kosong',
        ]
    
    );
        //return $request;
        ProductModel::where('id',$productModel->id)->update([
            'name' => $request->nama,
            'price' => $request->price
        ]);
        return redirect('/product')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $productModel)
    {
        ProductModel::destroy($productModel->id);
        return redirect('/product')->with('status_hapus', 'data berhasil dihapus');
    }
}
