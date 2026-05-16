<?php

namespace App\Controllers;

use App\Models\FoodModel;

class Menu extends BaseController
{
    public function index()
    {
        $category = $this->request->getGet('category');

        $foodModel = new FoodModel();

        if ($category) {
            $foods = $foodModel->where('category', $category)->findAll();
        } else {
            $foods = $foodModel->findAll();
        }

        return view('menu/index', [
            'foods' => $foods,
            'category' => $category
        ]);
    }
}