<?php

namespace App\Http\Controllers;
use App\Models\Tracker;
use App\Http\Requests\TrackerPostRequest;
use App\Http\Traits\RequestTrait;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;


class TrackerController extends Controller
{
    use RequestTrait;

    public function index(){

        //do i have to response the result as paginate?
        try{
            $all_tracker = Tracker::all('id', 'user_id', 'name', 'tracker_type');
            if($all_tracker){
                return $this->SuccessResponse($all_tracker);
            }
        }catch (ValidationException $exception){
            $this->configureException($exception);
        }catch(\Exception $exception){
            $this->writeErrors($exception);
        }

        return $this->FailResponse($this->message['data'],$this->message['messages'], $this->message['status'],$this->message['custom_code'],$this->message['validation']);
    }

    public function store(TrackerPostRequest $request, $user_id)
    {
        try {
           $validatedData =  $request->validated();

            $validatedData = $request->safe()->only(['name', 'tracker_type', 'user_id']);

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
