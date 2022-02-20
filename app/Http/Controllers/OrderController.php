<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $order = OrderModel:: all();
       return view('order/index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order/create');
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
            'nama' => 'required',
            'invoice' => 'required',
            'total' => 'required',
        ],
        [
            'nama.required' => 'nama custumer tidak boleh kosong',
            'invoice.required' => 'invoice tidak boleh kosong',
            'total.required' => 'total tidak boleh kosong',
        ]
    
    );
        //return $request;
        OrderModel::create([
            'customer_name' => $request->nama,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'status_order' => $request->status_order
        ]);
        return redirect('/order')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function show(OrderModel $orderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderModel $orderModel)
    {
        return view('order/edit', compact('orderModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderModel $orderModel)
    {
        $request->validate([
            'nama' => 'required',
            'invoice' => 'required',
            'total' => 'required',
        ],
        [
            'nama.required' => 'nama custumer tidak boleh kosong',
            'invoice.required' => 'invoice tidak boleh kosong',
            'total.required' => 'total tidak boleh kosong',
        ]
    
    );
        //return $request;
        OrderModel::where('id',$orderModel->id)->update([
            'customer_name' => $request->nama,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'status_order' => $request->status_order
        ]);
        return redirect('/order')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderModel $orderModel)
    {
        OrderModel::destroy($orderModel->id);
        return redirect('/order')->with('status_hapus', 'data berhasil dihapus');
    }
}
