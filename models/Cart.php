<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04.11.17
 * Time: 15:32
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    
    public function addToCart($menu, $count = 1)
    {
        if (isset($_SESSION['cart'][$menu->id])){
            $_SESSION['cart'][$menu->id]['count'] += $count;
        }
        else{
            $_SESSION['cart'][$menu->id] = [
                'count' => $count,
                'name' => $menu->name,
                'price' => $menu->price,
                'img' => $menu->img,
                'category' => $menu->category->name,
                'size' => $menu->size,
            ];
        }
        $_SESSION['cart.count'] = isset($_SESSION['cart.count']) ? $_SESSION['cart.count'] + $count : $count;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $count * $menu->price : $count * $menu->price;

    }

    /*
     * 
     */
    public function recalc($id)
    {
        if (!isset($_SESSION['cart'][$id])) return false;
        $countMinus = $_SESSION['cart'][$id]['count'];
        $sumMinus = $_SESSION['cart'][$id]['count'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.count'] -= $countMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }
}