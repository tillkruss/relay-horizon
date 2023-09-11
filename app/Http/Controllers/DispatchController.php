<?php

namespace App\Http\Controllers;

use App\Jobs\SimpleJob;
use Illuminate\Http\Request;
use CacheWerk\Relay\Laravel\Relay;

class DispatchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        SimpleJob::dispatch(mt_rand());

        return response()->json(
            Relay::stats()
        );
    }
}
