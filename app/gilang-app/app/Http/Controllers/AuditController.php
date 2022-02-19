<?php

namespace App\Http\Controllers;

use App\Models\audit;
use App\Models\barang;
use Illuminate\Http\Request;


class AuditController extends Controller
{
    public function index()
    {
        $data = [
            'audit' => audit::with('barang')->where('status', 0)->get(),
            'barang' => barang::all()
        ];
        return view('pages.audit', $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data = ['barang_id' => $request['barang_id'], 'qty' => $request['qty'], 'admin_id' => 1, 'audit_date' => date('ymd')];
        audit::create($data);
        toastr()->success('Data berhasil di tambah');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $audit = audit::find($id);
        $audit->delete();

        toastr()->success('Data berhasil di hapus');
        return redirect()->back();
    }
}
