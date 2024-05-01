<?php


namespace App\Services;
use App\Models\CartModel;
use Exception;

class CartService extends BaseService
{
    protected $cart = [];

    public function __construct()
    {
        // Initialize the cart array
        if (!session()->has('cart')) {
            session()->set('cart', []);
        }

        // Retrieve cart data from session
        $this->cart = session('cart');
    }
    public function insert($item)
    {
        // Add item to the cart array
        $this->cart[] = $item;

        // Save cart data to session
        session()->set('cart', $this->cart);
    }


}