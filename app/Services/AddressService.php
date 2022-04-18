<?php


namespace App\Services;

use App\Models\Address;

class AddressService
{
    protected $model;

    public function __construct()
    {
        $this->model = new Address();
    }

    public function get() {
        return Address::all();
    }

}
