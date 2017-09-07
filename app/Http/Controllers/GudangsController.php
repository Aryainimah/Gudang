<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gudang;
use App\History;
use Session;

class GudangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gudang = Gudang::all();
        return view ('gudangs.index',compact('gudang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gudangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $gudang = new Gudang;
        $gudang->nama_barang = $request->a;
        $gudang->merk = $request->b;
        $gudang->kuantitas = $request->c;
        $gudang->harga = $request->d;
        $gudang->total_harga = $request->c * $request->d;
        $gudang->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $gudang->nama_barang"
            ]);

        $history= new History;
        $history->action = "Tambah";
        $history->nama_barang = $request->a;
        $history->merk = $request->b;
        $history->kuantitas = $request->c;
        $history->harga = $request->d;
        $history->total_harga = $request->c * $request->d;
        $history->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil menyimpan $gudang->nama_barang"
            ]);
        return redirect('gudangs');
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
         $gudang = Gudang::findOrFail($id);
        return view('gudangs.show',compact('gudang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gudang = Gudang::findOrFail($id);
        return view('gudangs.edit',compact('gudang'));
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
        $gudang = Gudang::findOrFail($id);
        $gudang->nama_barang = $request->a;
        $gudang->merk = $request->b;
        $gudang->kuantitas = $request->c;
        $gudang->harga = $request->d;
        $gudang->total_harga = $request->c * $request->d;
        $gudang->save();

        $history= new History;
        $history->action = "Edit";
        $history->nama_barang = $request->a;
        $history->merk = $request->b;
        $history->kuantitas = $request->c;
        $history->harga = $request->d;
        $history->total_harga = $request->c * $request->d;
        $history->save();
        return redirect('gudangs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        $gudang=Gudang::find($id);
        $history= new History;
        $history->action = "Delete";
        $history->nama_barang = $gudang->nama_barang;
        $history->merk = $gudang->merk;
        $history->kuantitas = $gudang->kuantitas;
        $history->harga = $gudang->harga;
        $history->total_harga = $request->kuantitas * $request->harga;
        $history->save();

        Gudang::destroy($id);

        return redirect('gudangs');
    }

    public function drop()
    {
        History::truncate();
        return redirect('history');

    }
}
