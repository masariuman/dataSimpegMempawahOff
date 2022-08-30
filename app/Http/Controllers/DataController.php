<?php

namespace App\Http\Controllers;

use App\Models\Identpeg;
use App\Models\Jakhir;
use App\Models\Pakhir;
use App\Models\GolRuang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->get();
        foreach ($data as $datas) {
            $jakhir = Jakhir::where('NIP', $datas['NIP'])->first();
            if ($jakhir === null) {
                $datas['KESELON'] = null;
                $datas['NJAB'] = null;
            } else {
                $datas['KESELON'] = $jakhir['KESELON'];
                $datas['NJAB'] = $jakhir['NJAB'];
            }

            $pakhir = Pakhir::where('NIP', $datas['NIP'])->first();
            if ($pakhir === null) {
                $datas['NGOLRU'] = null;
                $datas['PANGKAT'] = null;
            } else {
                $golruang = GolRuang::where('KGOLRU', $pakhir['KGOLRU'])->first();
                if ($golruang === null) {
                    $datas['NGOLRU'] = null;
                    $datas['PANGKAT'] = null;
                } else {
                    $datas['NGOLRU'] = $golruang['NGOLRU'];
                    $datas['PANGKAT'] = $golruang['PANGKAT'];
                }
            }
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
}
