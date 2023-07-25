<?php

namespace App\Http\Controllers\HelpMana;

use App\Http\Controllers\Controller;
use App\Models\HelpMana\HelpCategory;
use Illuminate\Http\Request;

class HelpCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = $request->pageSize ?? 10;

        $models = HelpCategory::orderby('created_at', 'desc');
        $models = $models->paginate($pageSize);
        $models->appends(['pageSize' => $pageSize]);
        return view('helpMana.help_category.index')
            ->with('pageSize', $pageSize)
            ->with('models', $models);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new HelpCategory();

        return view('helpMana.help_category.create')
            ->with('model', $model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string'],
            ],
            $messages = [
                'name.required' => '必須項目です。',
            ]
        );


        $model = new HelpCategory();
        $model->name = $request->name ?? "";
        $model->other = $request->other ?? "";

        $model->save();

        return redirect()->route('help-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = HelpCategory::find($id);

        return view('helpMana.help_category.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $model = HelpCategory::find($id);

        return view('helpMana.help_category.edit')
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
                'name' => ['required', 'string'],
            ],
            $messages = [
                'name.required' => '必須項目です。',
            ]
        );

        $model = HelpCategory::find($id);
        $model->name = $request->name ?? "";
        $model->other = $request->other ?? "";

        $model->save();

        return redirect()->route('help-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = HelpCategory::find($id);
        $model->delete();
        return redirect()->route('help-category.index');
    }
}