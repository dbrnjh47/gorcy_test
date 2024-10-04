<?php

namespace App\Http\Services\Reservation;

use App\Models\Reservation;
use App\Http\Services\Validation\Controller as Validation;
use App\Http\Validations\ReservationValidations;
use App\Models\User;

class ReservationServices extends Validation
{
    protected $validation = null;
    public $limit = 10;
    public $is_confirmed = "all";
    public function __construct($request = null)
    {
        $this->validation = new ReservationValidations();

        if($request && isset($request->limit))
        {
            $this->limit = (int)$request->limit;
        }
        if($request && isset($request->is_confirmed))
        {
            $this->is_confirmed = (int)$request->is_confirmed;
        }
    }

    public function all()
    {
        $items = Reservation::query();

        if(is_int($this->is_confirmed))
        {
            $items->where("is_confirmed", $this->is_confirmed);
        }
        return $items->paginate($this->limit)->items();
    }

    public function create($request)
    {
        $this->validation(__FUNCTION__, $request);

        return Reservation::create($request->all());
    }

    public function distroy($id)
    {
        $this->validation(__FUNCTION__, ['id' => $id]);

        return Reservation::destroy($id);
    }

    public function update($data)
    {
        $this->validation(__FUNCTION__, $data);

        return Reservation::where('id', $data['id'])->update($data);
    }

    public function find($id)
    {
        return Reservation::find($id);
    }

    public function userAll($request)
    {

        $items = Reservation::query();

        if(is_int($this->is_confirmed))
        {
            $items->where("is_confirmed", $this->is_confirmed);
        }
        return $items->whereHas('user', function ($q) use ($request) {
            $q = $q->where("user_id", $request->id);
        })->paginate($this->limit)->items();

        //with('user')->
    }

    // public function userAll($user_id)
    // {
    //     return Reservation::where("user_id",$user_id)->get();
    // }
}
