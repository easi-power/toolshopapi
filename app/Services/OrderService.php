<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderService
{
    public function create(array $input)
    {
        //TODO: write the create function, don't forget that an order has multiple products!
    }

    public function index(Request $request) {
        //TODO: write the index/getAll function to return all orders from the database
    }

    public function get($id) {
        //TODO: write the get/getById function to return a specific order from the database
    }

    public function getWithProducts($id) {
        //TODO: write a function that returns all orders with it's products
    }

    public function edit($id, array $orderData) {
        //TODO: write a function to edit a specific order
    }

    public function delete($id) {
        //TODO: write a function to delete a specific order
    }

}
