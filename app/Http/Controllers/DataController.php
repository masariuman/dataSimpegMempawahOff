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
        foreach ($data as $data) {
            $jakhir = Jakhir::where('NIP', $data['NIP'])->first();
            if ($jakhir === null) {
                $data['KESELON'] = null;
                $data['NJAB'] = null;
            } else {
                $data['KESELON'] = $jakhir['KESELON'];
                $data['NJAB'] = $jakhir['NJAB'];
            }

            $pakhir = Pakhir::where('NIP', $data['NIP'])->first();
            if ($pakhir === null) {
                $data['NGOLRU'] = null;
                $data['PANGKAT'] = null;
            } else {
                $golruang = GolRuang::where('KGOLRU', $pakhir['KGOLRU'])->first();
                if ($golruang === null) {
                    $data['NGOLRU'] = null;
                    $data['PANGKAT'] = null;
                } else {
                    $data['NGOLRU'] = $golruang['NGOLRU'];
                    $data['PANGKAT'] = $golruang['PANGKAT'];
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
    public function show($id)
    {
        //
        $data = Identpeg::where('NIP', $id)->first();
        $jakhir = Jakhir::where('NIP', $data['NIP'])->first();
        if ($jakhir === null) {
            $data['KESELON'] = null;
            $data['NJAB'] = null;
        } else {
            $data['KESELON'] = $jakhir['KESELON'];
            $data['NJAB'] = $jakhir['NJAB'];
        }

        $pakhir = Pakhir::where('NIP', $data['NIP'])->first();
        if ($pakhir === null) {
            $data['NGOLRU'] = null;
            $data['PANGKAT'] = null;
        } else {
            $golruang = GolRuang::where('KGOLRU', $pakhir['KGOLRU'])->first();
            if ($golruang === null) {
                $data['NGOLRU'] = null;
                $data['PANGKAT'] = null;
            } else {
                $data['NGOLRU'] = $golruang['NGOLRU'];
                $data['PANGKAT'] = $golruang['PANGKAT'];
            }
        }
        return response()->json($data);
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
