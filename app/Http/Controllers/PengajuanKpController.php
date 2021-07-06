<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// ended
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\PengajuanKp;

class PengajuanKpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $pengajuans = PengajuanKp::select('id','no_pengajuan', 'judul_pengajuan', 'no_telp', 'jumlah_pegawai', 'status');
            return Datatables::of($pengajuans)
            ->addColumn('action', function($pengajuan){
                return view('datatable._action', [
                    'model'             => $pengajuan,
                    'form_url'          => route('mahasiswa.pengajuanKp.destroy', $pengajuan->id),
                    'edit_url'          => route('mahasiswa.pengajuanKp.edit', $pengajuan->id),
                    'confirm_message'   => 'Apakah anda yakin ingin mengahapus '. $pengajuan->judul_pengajuan . '?'
                ]);
            })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'no_pengajuan', 'name'=>'no_pengajuan', 'title'=>'No Pengajuan'])
            ->addColumn(['data' => 'judul_pengajuan', 'name'=>'judul_pengajuan', 'title'=>'Judul Pengajuan'])
            // ->addColumn(['data' => 'kerangka_pikir', 'name'=>'kerangka_pikir', 'title'=>'Kerangka Pikir'])
            ->addColumn(['data' => 'no_telp', 'name'=>'no_telp', 'title'=>'No Telphone'])
            ->addColumn(['data' => 'jumlah_pegawai', 'name'=>'jumlah_pegawai', 'title'=>'Jumlah Pegawai'])
            ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
            return view('pengajuanKp.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuanKp.create');
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
            'judul_pengajuan'=> 'required',
            'jumlah_pegawai' => 'required|numeric',
            'kerangka_pikir' => 'required|file'
        ]);

        $pengajuan = PengajuanKp::create($request->except('kerangka_pikir'));
            if($request->hasFile('kerangka_pikir')) {
                $uploadKerangkaPikir = $request->file('kerangka_pikir');
                $extention = $uploadKerangkaPikir->getClientOriginalExtension();
                $filename = md5(time()) . '.' . $extention;
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'kerangkaPikir';
                $uploadKerangkaPikir->move($destinationPath, $filename);
                $pengajuan->kerangka_pikir = $filename;
                $pengajuan->save();
            }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message" => "Pengajuan berhasil disimpan $pengajuan->judul_pengajuan"
        ]);
        return redirect()->route('mahasiswa.pengajuanKp.index');
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
        //
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
        PengajuanKp::destroy($id);
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Mahasiswa berhasil dihapus"
        ]);
        return redirect()->route('mahasiswa.pengajuanKp.index');
    }
}
