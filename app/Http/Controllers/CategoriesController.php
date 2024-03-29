<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Topic $topic)
    {
        //读取分类ID关联的话题 并按每20分页
        $topics = $topic->withOrder($request->order)
            ->where('category_id', $category->id)
            ->with('user', 'category')
            ->paginate(20);

        //传递变量话题和分类到模板
        return view('topics.index', compact('topics', 'category'));
    }

}
