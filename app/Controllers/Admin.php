<?php

namespace App\Controllers;

use App\Models\FoodModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function createFood()
    {
        return view('admin/create_food');
    }


 public function storeFood()
{
    $foodModel = new \App\Models\FoodModel();

    $image = $this->request->getFile('image');

    $newName = '';

    if ($image && $image->isValid()) {

        $newName = $image->getRandomName();

        $image->move(FCPATH . 'uploads/foods', $newName);
    }

    $foodModel->insert([

        'name' => $this->request->getPost('name'),

        'description' => $this->request->getPost('description'),

        'price' => $this->request->getPost('price'),

        'category' => $this->request->getPost('category'),

        'image' => $newName
    ]);

    return redirect()->to('/');
}

public function deleteFood($id)
{
    $foodModel = new \App\Models\FoodModel();

    $food = $foodModel->find($id);

    if ($food && !empty($food['image'])) {
        $imagePath = FCPATH . 'uploads/foods/' . $food['image'];

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $foodModel->delete($id);

    return redirect()->back();
}
}