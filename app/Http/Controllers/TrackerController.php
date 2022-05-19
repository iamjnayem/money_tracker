<?php

namespace App\Http\Controllers;
use App\Models\Tracker;
use App\Http\Requests\TrackerPostRequest;
use App\Http\Traits\RequestTrait;
use Illuminate\Validation\ValidationException;


class TrackerController extends Controller
{
    use RequestTrait;

    public function store(TrackerPostRequest $request)
    {

        try {
           $validatedData =  $request->validated();

            $validatedData = $request->safe()->only(['name', 'type', 'user_id']);

            $validatedData['type'] = json_encode($validatedData['type']);

            $tracker = Tracker::create($validatedData);
            if($tracker){

                return $this->SuccessResponse($tracker);
            }
        } catch (ValidationException $exception) {
            $this->configureException($exception);
        }catch (\Exception $exception){
            $this->writeErrors($exception);
        }
//        return response()->json([], 404);
        return $this->FailResponse($this->message['data'],$this->message['messages'],$this->message['status'],$this->message['custom_code'],
            $this->message['validation']);

    }
}
