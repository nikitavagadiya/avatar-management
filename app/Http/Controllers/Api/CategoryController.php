<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of category along with items.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllWithItem()
    {
        return $this->execute(function () {

            $categories = Category::with('items')->orderBy('position')->get();
            return $this->sendResponse(CategoryResource::collection($categories));

        });
    }
}
