<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::create([
            'estimated_time' => '09:50:00',
            'itenary_hour' => '09:50:00',
            'airline_code' => 'Avianca',
            'flight_number' => '8465',
            'origin' =>  'BOGOTA',
            'state' => 'Sin Novedad',
            'll_s' => 'Llegada',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '11:24:00',
            'itenary_hour' => '11:28:00',
            'airline_code' => 'LATAM',
            'flight_number' => '4248',
            'origin' =>  'SANTA MARTA',
            'state' => 'Abordo',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '11:39:00',
            'itenary_hour' => '11:34:00',
            'airline_code' => 'Avianca',
            'flight_number' => '9431',
            'origin' =>  'RIONEGRO',
            'state' => 'Aterrizo',
            'll_s' => 'Llegada',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '12:27:00',
            'itenary_hour' => '12:27:00',
            'airline_code' => 'CopaAirlines',
            'flight_number' => '308',
            'origin' =>  'PANAMA',
            'state' => 'A sala',
            'll_s' => 'Salida',
            'flight_type' => 'Internacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '13:03:00',
            'itenary_hour' => '13:03:00',
            'airline_code' => 'Wingo',
            'flight_number' => '7037',
            'origin' =>  'PANAMA',
            'state' => 'Sin Novedad',
            'll_s' => 'Llegada',
            'flight_type' => 'Internacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '14:00:00',
            'itenary_hour' => '14:00:00',
            'airline_code' => 'Clic',
            'flight_number' => '6966',
            'origin' =>  'PUERTO ASIS',
            'state' => 'Sin Novedad',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '11:00:00',
            'itenary_hour' => '11:09:00',
            'airline_code' => 'Clic',
            'flight_number' => '6909',
            'origin' =>  'GUAPI',
            'state' => 'Sin Novedad',
            'll_s' => 'Llegada',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);

        Flight::create([
            'estimated_time' => '11:21:00',
            'itenary_hour' => '11:12:00',
            'airline_code' => 'CopaAirlines',
            'flight_number' => '282',
            'origin' =>  'PANAMA',
            'state' => 'Aterrizo',
            'll_s' => 'Llegada',
            'flight_type' => 'Internacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '11:43:00',
            'itenary_hour' => '11:43:00',
            'airline_code' => 'SATENA',
            'flight_number' => '8653',
            'origin' =>  'GUAPI',
            'state' => 'Sin Novedad',
            'll_s' => 'Llegada',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '11:57:00',
            'itenary_hour' => '11:57:00',
            'airline_code' => 'LATAM',
            'flight_number' => '4353',
            'origin' =>  'RIONEGRO',
            'state' => 'Sin Novedad',
            'll_s' => 'Llegada',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '12:27:00',
            'itenary_hour' => '12:27:00',
            'airline_code' => 'CopaAirlines',
            'flight_number' => '309',
            'origin' =>  'PANAMA',
            'state' => 'Emigracion',
            'll_s' => 'Salida',
            'flight_type' => 'Internacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '11:20:00',
            'itenary_hour' => '11:00:00',
            'airline_code' => 'SATENA',
            'flight_number' => '8652',
            'origin' =>  'GUAPI',
            'state' => 'Abordo',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '10:55:00',
            'itenary_hour' => '11:05:00',
            'airline_code' => 'Avianca',
            'flight_number' => '8422',
            'origin' =>  'BOGOTA',
            'state' => 'Abordo',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '11:20:00',
            'itenary_hour' => '11:00:00',
            'airline_code' => 'Clic',
            'flight_number' => '6952',
            'origin' =>  'QUIBDO',
            'state' => 'A sala',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '11:26:00',
            'itenary_hour' => '11:26:00',
            'airline_code' => 'LATAM',
            'flight_number' => '4064',
            'origin' =>  'BOGOTA',
            'state' => 'Abordo',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
        Flight::create([
            'estimated_time' => '14:03:00',
            'itenary_hour' => '14:03:00',
            'airline_code' => 'Avianca',
            'flight_number' => '9228',
            'origin' =>  'BOGOTA',
            'state' => 'Sin Novedad',
            'll_s' => 'Salida',
            'flight_type' => 'Nacional',
            'date_flight' => now(),
        ]);
    }
}
