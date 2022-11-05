<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ShoppingCartService;

class ShoppingCartController extends Controller
{
    protected $shoppingCartService;

    public function __construct(
        ShoppingCartService $shoppingCartService
    )
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function create(Request $data)
    {
        $result = $this->shoppingCartService->create($data->all());
        return response()->json([
            'status' => __('message.success'),
            'data' => $result
        ]);
    }
    
}