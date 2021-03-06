<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client as Guzzle;
use Cache;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DemoController extends Controller
{
    const COUNTRIES_CACHE_KEY = 'all-countries';
    const COUNTRIES_CACHE_DURATION = 1;

    public static $model = null;

    /**
     * Simple demo request
     *
     * @return \Dingo\Api\Http\Response
     */
    public function demoRequest() {
        return $this->response()->noContent();
    }

    /**
     * Simple cache example
     *
     * @return \Dingo\Api\Http\Response
     */
    public function cacheExample() {

        $data = Cache::remember(static::COUNTRIES_CACHE_KEY, static::COUNTRIES_CACHE_DURATION, function() {
            $client = new Guzzle;
            $response = $client->request('GET', 'https://restcountries.eu/rest/v2/all');

            if ($response->getStatusCode() == 200) {

            } else {
                throw new \Exception('Guess what? That API is not playing. Womp Womp !');
            }

            return collect(json_decode($response->getBody()->getContents()));
        });

        $data = $data->pluck('name');

        return $this->response()->item($data, $this->getTransformer());
    }

    /**
     * An EXCEPTIONAL request
     */
    public function exceptionalRequest() {
        $client = new Guzzle;

        try {
            $response = $client->request('GET', 'https://api.nasa.gov/planetary/apod?api_key=');
        } catch (\Exception $e) {
            dump ($e);
            throw new AccessDeniedHttpException('Guess what? That API is not playing. Womp Womp !');
        }
    }
}
