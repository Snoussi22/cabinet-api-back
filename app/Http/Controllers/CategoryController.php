<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\PostCategoryRequest;

class CategoryController extends Controller
{
    /**
     * get all appointmentd
     */
    public function index()
    {
        $category = Category::get();
        return response()->json($category,200);
    }
    /**
     * delete appointment by id
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json($category,204);;
    }

    public function find($id)
    {
        $category = Category::find($id);
        return response()->json($category,200);

    }
    
    public function update(UpdateCategoryRequest $request, int $id)
    {
        $category = Category::find($id);
        $category->type_c = $request->type_c;
        $category->pharmaceutical_id = $request->pharmaceutical_id;
        $category->save();

        return response()->json($category,200);
    }

    

    public function store(PostCategoryRequest $request)
    {
        $category = new Category;
        $category->type_c = $request->type_c;
        $category->pharmaceutical_id = $request->pharmaceutical_id;
        $category->save();

        return response()->json($category,200);
    }
}
