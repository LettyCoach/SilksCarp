<?php

namespace App\Http\Controllers;

use App\Models\HelpMana\Help;
use App\Models\HelpMana\HelpCategory;
use Illuminate\Http\Request;

class HelpUserController extends Controller
{
    //
    public function user(Request $request) {
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

        return view('helpMana.help_user.index', compact('pageSize', 'models', 'categories', 'helpCategories'));
    }

    public function show(string $id)
    {
        //
        $model = Help::find($id);

        return view('helpMana.help_user.show')
            ->with('model', $model);
    }
}
