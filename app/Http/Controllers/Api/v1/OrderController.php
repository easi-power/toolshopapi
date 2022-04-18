<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderService;

    public function __construct()
    {
        //TODO: initialise service
    }

    public function index(Request $request)
    {
        //TODO: Call a function on the orderservice to get all the orders with return status 200
    }

    public function show($id)
    {
        //TODO: Call a function on the orderservice to get to get an order with a given id with return status 200
    }

    public function showWithProducts($id) {
        //TODO: Call a function on the orderservice to get all the orders with their products and return status 200
    }

    public function store(Request $request) {
        //TODO: Call a function on the orderservice to create an order with return status 201
    }

    public function update($id, Request $order) {
        //TODO: Call a function on the orderservice to update an order with return status 202
    }

    public function destroy($id) {
        //TODO: Call a function on the orderservice to delete an order with return status 204
    }
}

