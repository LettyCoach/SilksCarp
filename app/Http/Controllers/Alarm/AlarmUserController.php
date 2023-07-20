<?php

namespace App\Http\Controllers\Alarm;

use App\Http\Controllers\Controller;
use App\Models\Alarm\AlarmReadState;
use App\Models\Alarm\AlarmToAll;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;

class AlarmUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = $request->pageSize ?? 10;
        $selType = $request->selType ?? -1;
        $selState = $request->selState ?? 1;


        $models = Auth::user()->alarms();

        if ($selType > -1) {
            $models = $models->where('type', $selType);
        }
        if ($selState == 1) {
            $models = $models->where('read_date', '2000-01-01 00:00:00');
        } else if ($selState == 0) {
            $models = $models->where('read_date', '<>', '2000-01-01 00:00:00');
        }

        $models = $models->orderby('created_at', 'desc');

        $models = $models->paginate($pageSize);
        // dd($models);
        $models->appends(compact('pageSize', 'selType', 'selState'));


        return view('alarm.alarm_user.index', compact('pageSize', 'models', 'selType', 'selState'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = AlarmToAll::find($id);
        $user_id = Auth::user()->id;

        DB::table('alarm_read_states')
            ->where('user_id', $user_id)
            ->where('alarm_to_all_id', $id)
            ->update(['read_date' => Carbon::now()]);


        // $modelState = AlarmReadState::where('user_id', $user_id)->where('alarm_to_all_id', $id)->first();
        // if ($modelState !== null) {
        //     $modelState->read_date = Carbon::now();
        //     $modelState->save();
        // }

        return view('alarm.alarm_user.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}