<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
// use App\Prodi;
use App\Mahasiswa;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
// use Illuminate\Support\Facades\Session;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('mahasiswas.index');
    // }
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $mahasiswas = Mahasiswa::select(['id', 'nama', 'alamat']);
            return Datatables::of($mahasiswas)
            ->addColumn('action', function($mahasiswa) {
                return view('datatable._action', [
                    'model'     => $mahasiswa,
                    'form_url'  => route('admin.mahasiswa.destroy', $mahasiswa->id),
                    'edit_url'  => route('admin.mahasiswa.edit', $mahasiswa->id),
                ]);
            })->make(true);
        }
        
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
        ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('mahasiswas.index')->with(compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'          => 'required',
            'kode_prodi'    => 'required|exists:prodis, kode_prodi'
        ]);
        $mahasiswa = Mahasiswa::create($request->only('nama', 'kode_prodi'));
        return redirect()->route('mahasiswa.index');
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $mahasiswa->nama"
        ]);
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
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswas.edit')->with(compact('mahasiswa'));
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
        $this->validate($request, ['name' => 'required|unique:mahasiswas,name,'. $id]);
        $mahasiswa = Author::find($id);
        $mahasiswa->update($request->only('name'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan $mahasiswa->name"
        ]);
        return redirect()->route('mahasiswas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Mahasiswa berhasil dihapus"
        ]);
        return redirect()->route('admin.mahasiswa.index');

    }

    // export
    public function export() {
        return view('mahasiswas.export');
    }

    public function exportPost(Request $request) {

    }

    // import
    public function generateExcelTemplate() {

    }

    public function importExcel(Request $request) {

    }
}
