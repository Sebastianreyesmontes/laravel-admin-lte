<?php

namespace App\Http\Controllers\Prehome;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DatesController extends Controller
{
    public function __invoke()
    {
        $dates = DB::table('flights')
            ->select('*')->get();
        // $dates = Flight::select('flight_type', 'airline_code')->get();

        $nacionalLlegadaCounts1 = DB::table('flights')
            ->select('airline_code', DB::raw('count(*) as count'))
            ->where('flight_type', 'Nacional')
            ->where('ll_s', 'Llegada')
            ->groupBy('airline_code')
            ->pluck('airline_code');

            $nacionalLlegadaCounts2 = DB::table('flights')
            ->select('airline_code', DB::raw('count(*) as count'))
            ->where('flight_type', 'Nacional')
            ->where('ll_s', 'Llegada')
            ->groupBy('airline_code')
            ->pluck('count');

        $nacionalSalidaCounts = DB::table('flights')
            ->select('airline_code', DB::raw('count(*) as count'))
            ->where('flight_type', 'Nacional')
            ->where('ll_s', 'Salida')
            ->groupBy('airline_code')
            ->get();

        // dd($getData);
        // dd($nacionalLlegadaCount, $nacionalSalidaCount);
        return view('prehome.examples', compact('dates', 'nacionalLlegadaCounts1', 'nacionalLlegadaCounts2', 'nacionalSalidaCounts'));
    }
    // $datesData=

}
