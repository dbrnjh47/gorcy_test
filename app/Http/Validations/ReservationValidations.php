<?php


namespace App\Http\Validations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as V;
use App\Http\Services\Validation\Controller as Validation;
use Illuminate\Validation\Validator as ValidationValidator;

class ReservationValidations extends Validation
{
    public function create($request): V
    {
        $rules = [
            'user_id' => 'nullable|exists:App\Models\User,id',
            'date' => 'required|date|unique:App\Models\Reservation',
        ];
        $validator = Validator::make(
            $request->all(),
            $rules,
            [
            ]
        );

        $validator->after(function (ValidationValidator $validator) use ($request) {
            if (!$validator->errors()->messages()) {

            }
        });

        return $this->result($validator);
    }

    public function distroy($data): V
    {
        $validator = Validator::make(
            $data,
            [
                'id' => 'required|exists:App\Models\Reservation',
            ],
            [
            ]
        );

        return $this->result($validator);
    }

    public function update($data): V
    {
        $rules = [
            'user_id' => 'nullable|exists:App\Models\User,id',
            'date' => 'nullable|date|unique:App\Models\Reservation,date,'.$data['id'],
            'is_confirmed' => 'nullable|boolean',
            'id' => 'required|exists:App\Models\Reservation,id',
        ];
        $validator = Validator::make(
            $data,
            $rules,
            [
            ]
        );

        return $this->result($validator);
    }
}
