<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryEvent;
use App\Filters\CategoryFilter;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use App\Http\Requests\CategoryDelete;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = CategoryFilter::apply($request);

        return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Category $category)
    {
        if ($category->update($request->all())) {
            return new CategoryResource($category);
        }
        return response()->json([
            'errors' => ['message' => 'Category was not updated successfully']
        ], 520);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDelete $request, Category $category)
    {
        if ($category->delete()) {
            return response(null, 204);
        }
        return response()->json([
            'errors' => ['message' => 'Unknown Error. Category was not deleted']
        ], 520);
    }
}
