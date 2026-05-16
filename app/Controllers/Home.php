<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $categories = [

    [
        'name' => 'Burgerler',
        'slug' => 'burgers',
        'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd'
    ],

    [
        'name' => 'Pizzalar',
        'slug' => 'pizzas',
        'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591'
    ],

    [
        'name' => 'Makarnalar',
        'slug' => 'pastas',
        'image' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9'
    ],

    [
        'name' => 'Izgaralar',
        'slug' => 'bbqs',
        'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947'
    ],

    [
        'name' => 'Tatlılar',
        'slug' => 'desserts',
        'image' => 'https://images.unsplash.com/photo-1551024601-bec78aea704b'
    ],

    [
        'name' => 'İçecekler',
        'slug' => 'drinks',
        'image' => 'https://images.unsplash.com/photo-1544145945-f90425340c7e'
    ]

];
        return view('home', [
    'categories' => $categories
]);
}}