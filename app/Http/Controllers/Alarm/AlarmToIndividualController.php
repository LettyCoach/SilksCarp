<?php

namespace App\Http\Controllers\Alarm;

use App\Http\Controllers\Controller;
use App\Models\Alarm\AlarmToIndividual;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AlarmToIndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = $request->pageSize ?? 10;
        $selType = $request->selType ?? -1;
        $selUser_id = $request->selUser_id ?? -1;
        $selState = $request->selState ?? -1;
        $selRead_date = $request->selRead_state;

        $models = AlarmToIndividual::orderby('created_at', 'desc');
        if ($selType > -1) {
            $models = $models->where('type', $selType);
        }

        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);

        $users = User::where('role', '<>', 'admin')->orderby('name', 'asc');

        $today = Date('Y-m-d');


        return view(
            'alarm.alarm2individual.index',
            compact(
                'models',
                'users',
                'pageSize',
                'selType',
                'selUser_id',
                'selState',
                'selRead_date',
                'today'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new AlarmToIndividual();

        $today = Date('Y-m-d');

        return view('alarm.alarm2individual.create', compact('model', 'today'));
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

        $model = new AlarmToIndividual();
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
        $model = AlarmToIndividual::find($id);

        return view('alarm.alarm2individual.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = AlarmToIndividual::find($id);

        return view('alarm.alarm2individual.edit')
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

        $model = AlarmToIndividual::find($id);
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
        $model = AlarmToIndividual::find($id);
        $model->delete();

        return redirect()->route('a2a.index');
    }
}