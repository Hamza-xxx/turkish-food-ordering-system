<?php

namespace App\Controllers;

use App\Models\FoodModel;

class Cart extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];

        return view('cart/index', [
            'cart' => $cart
        ]);
    }

    public function add($id)
{
    $foodModel = new FoodModel();

    $food = $foodModel->find($id);

    $qty = (int) $this->request->getPost('qty');

    if ($qty < 1) {
        $qty = 1;
    }

    $cart = session()->get('cart') ?? [];

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += $qty;
    } else {
        $cart[$id] = [
            'id' => $food['id'],
            'name' => $food['name'],
            'price' => $food['price'],
            'image' => $food['image'],
            'qty' => $qty
        ];
    }

    session()->set('cart', $cart);

    return redirect()->back();
}

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];

        unset($cart[$id]);

        session()->set('cart', $cart);

        return redirect()->back();
    }

    public function checkout()
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->to('/cart');
        }

        $db = \Config\Database::connect();

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $discount = session()->get('discount') ?? 0;

$discountAmount = ($total * $discount) / 100;

$total = $total - $discountAmount;
        $db->table('orders')->insert([
            'user_id' => session()->get('user_id'),
            'total' => $total,
            'status' => 'pending'
        ]);

        $orderId = $db->insertID();

        foreach ($cart as $item) {
            $db->table('order_items')->insert([
                'order_id' => $orderId,
                'food_id' => $item['id'],
                'quantity' => $item['qty']
            ]);
        }

        session()->remove('cart');
        session()->remove('discount');

        return redirect()->to('/invoice/' . $orderId);
    }

    public function invoice($id)
    {
        $db = \Config\Database::connect();

        $order = $db->table('orders')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        $items = $db->query("
            SELECT
                order_items.quantity,
                foods.name,
                foods.price
            FROM order_items
            JOIN foods ON foods.id = order_items.food_id
            WHERE order_items.order_id = $id
        ")->getResultArray();

        return view('cart/invoice', [
            'order' => $order,
            'items' => $items
        ]);
    }

public function applyCoupon()
{
    $coupon = $this->request->getPost('coupon');

    $discount = 0;

    if ($coupon === 'HAMZA10') {
        $discount = 10;
    }

    if ($coupon === 'FOOD20') {
        $discount = 20;
    }

    session()->set('discount', $discount);

    return redirect()->back();
}
}