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
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->whereIn('KSTATUS', [1, 2, 8])->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
    }

    public function all()
    {
        //
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
    }

    public function pns()
    {
        //
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->where('KSTATUS', 2)->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
    }

    public function cpns()
    {
        //
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->where('KSTATUS', 1)->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
    }

    public function pppk()
    {
        //
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->where('KSTATUS', 8)->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
    }

    public function pensiun()
    {
        //
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->where('KSTATUS', 3)->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
    }

    public function pindah()
    {
        //
        $index = 0;
        $data = Identpeg::where(DB::raw('LENGTH(NIP)'), '=', '18')->where('KSTATUS', 5)->get();
        $final = [];
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

            $final[$index]['NIP'] = $datas['NIP'];
            $final[$index]['GLDEPAN'] = $datas['GLDEPAN'];
            $final[$index]['NAMA'] = $datas['NAMA'];
            $final[$index]['GLBLK'] = $datas['GLBLK'];
            $final[$index]['KESELON'] = $datas['KESELON'];
            $final[$index]['NJAB'] = $datas['NJAB'];
            $final[$index]['KJKEL'] = $datas['KJKEL'];
            $final[$index]['KAGAMA'] = $datas['KAGAMA'];
            $final[$index]['KTLAHIR'] = $datas['KTLAHIR'];
            $final[$index]['TLAHIR'] = $datas['TLAHIR'];
            $final[$index]['ALJALAN'] = $datas['ALJALAN'];
            $final[$index]['ALRT'] = $datas['ALRT'];
            $final[$index]['ALRW'] = $datas['ALRW'];
            $final[$index]['NGOLRU'] = $datas['NGOLRU'];
            $final[$index]['PANGKAT'] = $datas['PANGKAT'];
            $final[$index]['PROYEKSI_TGL_BUP'] = null;
            $final[$index]['PROYEKSI_USIA_BUP'] = null;
            $final[$index]['FILE_BMP'] = null;
            $final[$index]['FILE_EXISTS'] = null;
            $index++;
        }
        return response()->json($final);
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
        if ($data === null) {
            return response()->json('data tidak ada');
        } else {
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
            $final['NIP'] = $data['NIP'];
            $final['GLDEPAN'] = $data['GLDEPAN'];
            $final['NAMA'] = $data['NAMA'];
            $final['GLBLK'] = $data['GLBLK'];
            $final['KESELON'] = $data['KESELON'];
            $final['NJAB'] = $data['NJAB'];
            $final['KJKEL'] = $data['KJKEL'];
            $final['KAGAMA'] = $data['KAGAMA'];
            $final['KTLAHIR'] = $data['KTLAHIR'];
            $final['TLAHIR'] = $data['TLAHIR'];
            $final['ALJALAN'] = $data['ALJALAN'];
            $final['ALRT'] = $data['ALRT'];
            $final['ALRW'] = $data['ALRW'];
            $final['NGOLRU'] = $data['NGOLRU'];
            $final['PANGKAT'] = $data['PANGKAT'];
            $final['PROYEKSI_TGL_BUP'] = null;
            $final['PROYEKSI_USIA_BUP'] = null;
            $final['FILE_BMP'] = null;
            $final['FILE_EXISTS'] = null;
        }

        return response()->json($final);
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
