<?php

namespace App\Http\Controllers;

use App\Http\Traits\RequestTrait;
use Illuminate\Http\Request;
use App\Models\Tracker;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class TrackerController extends Controller
{
    use RequestTrait;

    public function store(Request $request)
    {
        $rules = [
            "name" => "required",
            "type" => "required",
            "user_id" => "required",
        ];

        try {
            $validation = Validator::make($request->all(), $rules);
            if($validation->fails()){
                throw new ValidationException($validation);
            }
            $arr = $request->only([
                'name',
                'type',
                'user_id'
            ]);


            $arr['type'] = json_encode($arr['type']);

            //before creating authorization is needed
            $tracker = Tracker::create($arr);
            if($tracker){

                return $this->SuccessResponse($tracker);
            }
        } catch (ValidationException $exception) {
            $this->configureException($exception);
        }catch (\Exception $exception){
            $this->writeErrors($exception);
        }
//        return response()->json([], 404);
        return $this->FailResponse($this->message['data'],$this->message['messages'],$this->message['status'],$this->message['custom_code'],$this->message['validation']);

    }
}
