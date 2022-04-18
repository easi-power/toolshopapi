<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;

    public function __construct()
    {
        //TODO: initialise service
    }

    public function index(Request $request)
    {
        //TODO: Call a function on the productservice to get all the products with return status 200
    }

    public function show($id)
    {
        //TODO: Call a function on the productservice to get a product with a given id with return status 200
    }

    public function store(Request $request)
    {
        //TODO: Call a function on the productservice to create a product with return status 201
    }

    public function destroy($id) {
        //TODO: Call a function on the productservice to delete a product with a given id with return status 204
    }

    public function update($id, Request $request) {
        //TODO: Call a function on the productservice to update a product with a given id with return status 202
    }
}
