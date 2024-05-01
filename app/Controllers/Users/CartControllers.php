<?php

namespace App\Controllers;

use App\Models\CartModel;
use CodeIgniter\Controller;
use App\Models\ProductModel;

class CartControllers extends Controller
{
    

    public function cart(){
        // Khởi đầu session
        session_start();

        // Lấy giỏ hàng từ session (nếu có)
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Tính tổng số tiền của giỏ hàng
        $totalPrice = 0;
        foreach ($cart as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
        }

        // Truyền tổng số tiền vào view
        return view('cart', ['totalPrice' => $totalPrice]);
    }

    public function removeItem($id_product)
    {
        session_start();

        $items = $_SESSION['cart'];
        $cartItems = explode(",", $items);
    
        if(isset($_GET['remove']) & !empty($_GET['remove'])){
    
            $deleteitem = $_GET['remove'];
    
            if (($key = array_search($deleteitem, $cartItems)) !== false) {
                unset($cartitems[$key]);
            }
    
            $itemids = implode(",", $cartItems);
            $_SESSION['cart'] = $itemids;
        }
    
    }

   
  
    private function unsetFromCart($productId)
    {
      $session = session();
      $cart = $session->get('cart');
      if (isset($cart[$productId])) {
        unset($cart[$productId]);
        $session->set('cart', $cart);
      }
    }
  
  

}