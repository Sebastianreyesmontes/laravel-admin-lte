<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrehomeController extends Controller
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

        $nacionalSalidaCounts1 = DB::table('flights')
            ->select('airline_code', DB::raw('count(*) as count'))
            ->where('flight_type', 'Nacional')
            ->where('ll_s', 'Salida')
            ->groupBy('airline_code')
            ->pluck('airline_code');

        $nacionalSalidaCounts2 = DB::table('flights')
            ->select('airline_code', DB::raw('count(*) as count'))
            ->where('flight_type', 'Nacional')
            ->where('ll_s', 'Salida')
            ->groupBy('airline_code')
            ->pluck('count');

        $allNacional = DB::table('flights')
            ->select('airline_code', DB::raw('count(*) as count'))
            ->where('flight_type', 'Nacional')
            ->where('ll_s', 'Salida')
            ->groupBy('airline_code')
            ->unionAll(
                DB::table('flights')
                    ->select('airline_code', DB::raw('count(*) as count'))
                    ->where('flight_type', 'Nacional')
                    ->where('ll_s', 'Llegada')
                    ->groupBy('airline_code')
            )
            ->get();
            $namesallNa = $allNacional->pluck('airline_code');
            $countsallNa = $allNacional->pluck('count');

        // dd($getData);
        // dd($nacionalLlegadaCount, $nacionalSalidaCount);
        // dd($nacionalSalidaCounts1, $nacionalSalidaCounts2);
        return view("Prehome/prehome", compact('dates', 'nacionalLlegadaCounts1', 'nacionalLlegadaCounts2', 'nacionalSalidaCounts1', 'nacionalSalidaCounts2', 'namesallNa', 'countsallNa'));
    }

}
