<?php

namespace App\Http\Controllers\MessageMana;

use App\Http\Controllers\Controller;
use App\Models\MessageMana\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class MessageController extends Controller
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

        $models = Message::orderby('created_at', 'desc');
        if ($selType > -1) {
        }

        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);

        $users = User::whereNull('role')->orWhere('role', '<>', 'admin')->orderby('name', 'asc')->get();

        return view(
            'messageMana.message.index',
            compact(
                'models',
                'users',
                'pageSize',
                'selType',
                'selUser_id',
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

        return view('messageMana.message.create', compact('model'));
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

        $model = new Message();
        $model->user_id = Auth::user()->id;
        $model->content = $request->content ?? "";
        $model->parent_id = null;
        $model->response_state = 0;

        $model->save();

        return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = Message::find($id);

        return view('messageMana.message.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = Message::find($id);

        return view('messageMana.message.edit')
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

        $model = Message::find($id);
        $model->type = $request->type;
        $model->title = $request->title;
        $model->description = $request->description ?? "";
        $model->other = '';

        $model->save();

        return redirect()->route('message.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $model = Message::find($id);
        $model->delete();

        return redirect()->route('message.index');
    }
}