<?php

namespace App\Http\Controllers\API;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Services\Reservation\ReservationServices;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function all(Request $request)
    {
        return (new ReservationServices($request))->all();
    }

    public function create(Request $request)
    {
        return (new ReservationServices)->create($request);
    }

    public function distroy($id)
    {
        return (new ReservationServices)->distroy($id);
    }

    public function update(Request $request)
    {
        return (new ReservationServices)->update($request->all());
    }

    public function find($id)
    {
        return (new ReservationServices)->find($id);
    }

    public function userAll(Request $request)
    {
        return (new ReservationServices($request))->userAll($request);
    }
}
