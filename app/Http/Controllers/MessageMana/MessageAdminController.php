<?php

namespace App\Http\Controllers\MessageMana;

use App\Http\Controllers\Controller;
use App\Models\MessageMana\Message;
use App\Models\MessageMana\MessageSub;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class MessageAdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = $request->pageSize ?? 10;
        $response_state = $request->response_state ?? 0;

        $models = Message::orderby('created_at', 'desc');

        if ($response_state > -1) {
            $models = $models->where('response_state', $response_state);
        }

        if ($response_state === 0) {
            // $models = $models->where('read_date', '2000-01-01 00:00:00');

        } else if ($response_state === 1) {
            // $models = $models->where('read_date', '<>', '2000-01-01 00:00:00');
        }

        $cnt = count($models->get());

        $models = $models->orderby('created_at', 'desc');

        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'response_state'));

        return view(
            'messageMana.message_admin.index',
            compact(
                'models',
                'pageSize',
                'response_state',
                'cnt'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new Message();

        return view('messageMana.message_admin.create', compact('model'));
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
                'content' => 'required|string',
            ],
        );

        $model = new MessageSub();
        $model->title = $request->title ?? "";
        $model->content = $request->content ?? "";
        $model->type = 1;
        $model->message_id = $request->message_id;
        $model->parent_id = null;
        $model->read_date = "2000-01-01 00:00:00";
        $model->response_state = 0;

        $model->save();

        // return redirect()->route('message-admin.show', ['message_admin' => $model->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = Message::find($id);
        $subModels = $model->messages()->orderby('created_at', 'asc');

        return view('messageMana.message_admin.show', compact('model', 'subModels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $crtDateTime = Carbon::now();
        $model = Message::find($id);
        $model->read_date = $crtDateTime;
        $model->save();
        $subModels = $model->messages()->orderby('created_at', 'asc')->get();
        foreach ($subModels as $m) {
            if ($m->type === 1)
                continue;
            $m->read_date = $crtDateTime;
            $m->save();
        }

        return view('messageMana.message_admin.edit', compact('model', 'subModels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'title' => 'required|string',
                'content' => 'required|string',
            ],
        );

        $model = new MessageSub();
        $model->title = $request->title ?? "";
        $model->content = $request->content ?? "";
        $model->type = 1;
        $model->message_id = $id;
        $model->parent_id = null;
        $model->read_date = "2000-01-01 00:00:00";

        $model->save();

        return redirect()->route('message-admin.edit', ['message_admin' => $id]);
    }

    public function setResponseState(Request $request)
    {
        $id = $request->id;
        $model = Message::find($id);
        $model->response_state = 1;
        $model->save();

        return redirect()->route('message-admin.edit', ['message_admin' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        // $model = Message::find($id);
        // $model->delete();

        // return redirect()->route('message.index');
    }
}