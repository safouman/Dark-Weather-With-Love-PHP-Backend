<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherController extends Controller
{

    const API_KEY = "304840d9d3d6e250ab1f3dda0273969d";
    const BASE_URL = "https://api.darksky.net/forecast";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getForecast (Request $request)
    {
        $latitude = $request->input('lat');
        $longitude = $request->input('lon');

        $client = new Client();
        $weather = $client->get(WeatherController::BASE_URL . "/" . WeatherController::API_KEY . "/" . $latitude . "," . $longitude ."?units=si");

        return response($weather->getBody())
                ->header('Content-Type', 'application/json'); 
    }

    public function getTimeMachine (Request $request)
    {
        $latitude = $request->input('lat');
        $longitude = $request->input('lon');
        $time = $request->input('time');
      
        $client = new Client();
        $weather = $client->get(WeatherController::BASE_URL . "/" . WeatherController::API_KEY . "/" . $latitude . "," . $longitude . "," . $time ."?units=si");

        return response($weather->getBody())
                ->header('Content-Type', 'application/json');
    }
}
