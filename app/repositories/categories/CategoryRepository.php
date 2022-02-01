<?php

namespace App\repositories\categories;

use App\Models\Category;

class CategoryRepository
{
    public function index()
    {
        return Category::orderBy('id','DESC')->whereNull('parent_id')->get();
    }

    public function store($categoryStoreRequest)
    {
        Category::create($categoryStoreRequest->all());
    }

    public function update($categoryStoreRequest,$category)
    {
        $category->update($categoryStoreRequest->all());
    }

    public function delete($category)
    {
        $category->delete();
    }
}
