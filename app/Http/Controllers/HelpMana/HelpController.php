<?php

namespace App\Http\Controllers\HelpMana;

use App\Http\Controllers\Controller;
use App\Models\HelpMana\Help;
use App\Models\HelpMana\HelpCategory;
use App\Models\HelpMana\HelpToCategory;
use Illuminate\Http\Request;
use Session;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageSize = $request->pageSize ?? 10;

        $categories = $request->categories ?? "";

        $category_ids = explode(",", $categories);

        $models = Help::orderby('display_order', 'asc')->orderby('created_at', 'asc');
        $ids = [];
        if (count($category_ids) > 0 && $categories !== "") {
            $tmpModels = $models->get();
            foreach ($tmpModels as $t) {
                $tmpCategories = $t->categories()->whereIn('id', $category_ids)->get();
                if (count($tmpCategories) > 0) {
                    array_push($ids, $t->id);
                }
            }
            $models = $models->whereIn('id', $ids);
        }
        $models = $models->paginate($pageSize);
        $models->appends(compact('pageSize', 'categories'));

        $helpCategories = HelpCategory::all();

        return view('helpMana.help.index', compact('pageSize', 'models', 'categories', 'helpCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new Help();
        $helpCategories = HelpCategory::all();

        return view('helpMana.help.create', compact('model', 'helpCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'display_order' => 'required|integer',
                'title' => 'required|string',
                'content' => 'required|string',
            ],
        );

        $model = new Help();
        $model->display_order = $request->display_order;
        $model->title = $request->title ?? "";
        $model->content = $request->content ?? "";

        $model->save();

        $categories = $request->categories;

        foreach ($categories as $c) {
            $cModel = new HelpToCategory();
            $cModel->help_id = $model->id;
            $cModel->help_category_id = $c;
            $cModel->save();
        }

        return redirect()->route('help.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = Help::find($id);

        return view('helpMana.help.show')
            ->with('model', $model);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Help::find($id);
        $categories = [];
        foreach ($model->categories as $o) {
            array_push($categories, $o->id);
        }
        // dd($categories);
        $helpCategories = HelpCategory::all();

        return view('helpMana.help.edit', compact('model', 'categories', 'helpCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'display_order' => 'required|integer',
                'title' => 'required|string',
                'content' => 'required|string',
            ],
        );

        $model = Help::find($id);
        $model->display_order = $request->display_order;
        $model->title = $request->title ?? "";
        $model->content = $request->content ?? "";

        $model->save();

        $categories = $request->categories;

        HelpToCategory::where('help_id', $id)->delete();


        foreach ($categories as $c) {
            $cModel = new HelpToCategory();
            $cModel->help_id = $model->id;
            $cModel->help_category_id = $c;
            $cModel->save();
        }

        return redirect()->route('help.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $model = Help::find($id);
        $model->delete();

        return redirect()->route('help.index');
    }
}