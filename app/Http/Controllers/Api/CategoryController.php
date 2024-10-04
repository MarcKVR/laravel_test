<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return response()->json($categories);
    }

    public function all()
    {
        return response()->json(Category::get());
    }

    public function slug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return response()->json($category);
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("Category deleted");
    }

    public function posts(Category $category)
    {
        // $posts = Post::join('categories', "categories.id", "=", "posts.category_id")
        //     ->select("posts.*", "categories.title as category")
        //     ->where("categories.id", $category->id)
        //     ->get();

        // $sql_query = Post::join('categories', "categories.id", "=", "posts.category_id")
        //     ->select("posts.*", "categories.title as category")
        //     ->where("categories.id", $category->id)
        //     ->toSql();

        // return response()->json($sql_query);

        $posts = Post::with("category")
            ->where("category_id", $category->id)
            ->get();

        return response()->json($posts);
    }
}
