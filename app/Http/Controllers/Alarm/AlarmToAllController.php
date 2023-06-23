<?php

namespace App\Http\Controllers\Alarm;

use App\Http\Controllers\Controller;
use App\Models\Alarm\AlarmToAll;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class AlarmToAllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = $request->pageSize ?? 10;
        $selType = Session::get('selType') ?? -1;
        $selType = $request->selType ?? $selType;

        $models = AlarmToAll::orderby('created_at', 'desc');
        if ($selType > -1) {
            $models = $models->where('type', $selType);
        }
        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);

        Session::put('selType', $selType);

        return view('alarm.alarm2all.index', compact('pageSize', 'models', 'selType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new AlarmToAll();

        $today = Date('Y-m-d');

        return view('alarm.alarm2all.create', compact('model', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string',
            ],
        );

        $model = new AlarmToAll();
        $model->type = $request->type;
        $model->title = $request->title ?? "";
        $model->description = $request->description ?? "";
        $model->end_date = Carbon::parse("$request->end_date 23:59:59");
        $model->other = '';

        $model->save();

        return redirect()->route('a2a.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = AlarmToAll::find($id);

        return view('alarm.alarm2all.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = AlarmToAll::find($id);

        return view('alarm.alarm2all.edit')
            ->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string',
            ],
        );

        $model = AlarmToAll::find($id);
        $model->type = $request->type;
        $model->title = $request->title;
        $model->description = $request->description ?? "";
        $model->end_date = Carbon::now();
        $model->other = '';

        $model->save();

        return redirect()->route('a2a.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $model = AlarmToAll::find($id);
        $model->delete();

        return redirect()->route('a2a.index');
    }
}