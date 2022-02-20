<?php

namespace App\Http\Controllers;

use App\Models\TableModel;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = TableModel::all();
        return view('table/index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table/create');
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
            'no_meja' => 'required',
        ],
        [
            'no_meja.required' => 'jangan kosongkan no meja anda',
        ]
    
    );
        //return $request;
        TableModel::create([
            'number' => $request->no_meja,
            'status_table' => $request->status_meja
        ]);
        return redirect('/table')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableModel  $tableModel
     * @return \Illuminate\Http\Response
     */
    public function show(TableModel $tableModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableModel  $tableModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TableModel $tableModel)
    {
        return view('table/edit', compact('tableModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableModel  $tableModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableModel $tableModel)
    {
         //validasi
         $request->validate([
            'no_meja' => 'required',
        ],
        [
            'no_meja.required' => 'jangan kosongkan no meja anda',
        ]
    
    );
        //return $request;
        TableModel::where('id',$tableModel->id)->update([
            'number' => $request->no_meja,
            'status_table' => $request->status_meja
        ]);
        return redirect('/table')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableModel  $tableModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableModel $tableModel)
    {
        TableModel::destroy($tableModel->id);
        return redirect('/table')->with('status_hapus', 'data berhasil dihapus');
    }
}
