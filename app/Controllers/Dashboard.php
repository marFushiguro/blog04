<?php

namespace App\Controllers;

use App\Models\PostModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();

        $data['posts'] = $postModel
            ->select('posts.*, categories.name as category')
            ->join('categories', 'categories.id = posts.category_id')
            ->findAll();

        return view('admin/dashboard', $data);
    }
}
