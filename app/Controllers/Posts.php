<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoryModel;

class Posts extends BaseController
{
    public function index()
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->select('posts.*, categories.name as category')
                                   ->join('categories', 'categories.id = posts.category_id')
                                   ->findAll();
        return view('admin/posts/index', $data);
    }

    public function create()
    {
        $catModel = new CategoryModel();
        $data['categories'] = $catModel->findAll();
        return view('admin/posts/create', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'title' => 'required|min_length[3]',
            'summary' => 'required',
            'category_id' => 'required|is_natural_no_zero',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image');
        $newName = $file->getRandomName();
        $file->move('uploads/', $newName);

        $postModel = new PostModel();
        $postModel->save([
            'title' => $this->request->getPost('title'),
            'summary' => $this->request->getPost('summary'),
            'category_id' => $this->request->getPost('category_id'),
            'image' => $newName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/dashboard')->with('msg', 'Post creado exitosamente');
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $catModel = new CategoryModel();

        $data['post'] = $postModel->find($id);
        $data['categories'] = $catModel->findAll();

        return view('admin/posts/edit', $data);
    }

    public function update($id)
    {
        $postModel = new PostModel();
        $rules = [
            'title' => 'required|min_length[3]',
            'summary' => 'required',
            'category_id' => 'required|is_natural_no_zero'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'summary' => $this->request->getPost('summary'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        if ($file = $this->request->getFile('image')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/', $newName);
                $data['image'] = $newName;
            }
        }

        $postModel->update($id, $data);

        return redirect()->to('admin/dashboard')->with('msg', 'Post actualizado');
    }

    public function delete($id)
    {
        $postModel = new PostModel();
        $postModel->delete($id);

        return redirect()->to('admin/dashboard')->with('msg', 'Post eliminado');
    }
}