<?php

namespace app\models;


use yii\db\ActiveRecord;

class Cart
{

    public function addToCart($product, $qty = 1)
    {
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }
        elseif($promo = Promotion::findOne(["product_id" => $product->id])) {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->title,
                'price' => $product->price - $product->price * ($promo->rate / 100),
                'image' => $product->image,
            ];
        } else {

            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->title,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty *  $_SESSION['cart'][$product->id]['price'] : $qty * $_SESSION['cart'][$product->id]['price'];
    }

    public function recalc($id){
        if (!isset($_SESSION['cart'][$id])){
            return false;
        }
            $qtyMinus = $_SESSION['cart'][$id]['qty'];
            $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
            $_SESSION['cart.qty'] -= $qtyMinus;
            $_SESSION['cart.sum'] -= $sumMinus;
            unset($_SESSION['cart'][$id]);

    }
}