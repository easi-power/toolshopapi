<?php


namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    public function index(Request $request) {
        //TODO: write the index/getAll function to return all products from the database
    }

    public function getOne(int $id)
    {
        //TODO: write the getOne/getById function to return a specific product from the database
    }

    public function store(array $input)
    {
        //TODO: write the store/create function to create a new product
    }

    public function update(int $id, array $input)
    {
        //TODO: write a function to update a specific product
    }

    public function delete(int $id)
    {
        //TODO: write a function to delete a specific product
    }
}
