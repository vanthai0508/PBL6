<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ShoppingCartDetailService;

class ShoppingCartDetailController extends Controller
{
    protected $shoppingCartDetail;

    public function __construct(
        ShoppingCartDetailService $shoppingCartDetail
    )
    {
        $this->shoppingCartDetail = $shoppingCartDetail;
    }

    public function addFruitCart(Request $data)
    {
        if($result = $this->shoppingCartDetail->addFruitCart($data->all())) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
        
    }

    public function updateFruitCart(Request $data)
    {
        if($result = $this->shoppingCartDetail->updateFruitCart($data->all())) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
    }
}