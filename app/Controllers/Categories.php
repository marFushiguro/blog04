<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    public function index()
    {
        $catModel = new CategoryModel();
        $data['categories'] = $catModel->findAll();
        return view('admin/categories/index', $data);
    }

    public function create()
    {
    
        return view('admin/categories/create');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[3]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

    
        $catModel = new CategoryModel();
        $catModel->save([
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('admin/dashboard')->with('msg', 'Categoria creada exitosamente');
    }

    /*public function edit($id)
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
    }*/

    public function delete($id)
    {
        $catModel = new CategoryModel();
        $catModel->delete($id);

        return redirect()->to('admin/categories')->with('msg', 'Categoria eliminada');
    }
}