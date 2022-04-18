<?php

namespace Database\Seeders;

use App\Http\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->bolts();
        $this->wrenches();
    }

    private function bolts()
    {
        $product = [
                "name" => "Bolts 8mm",
                "description" => "High quality steel bolts from Harry",
                "price" => 0.05,
                "stock" => 10000,
                "max_capacity" => 1000000,
                "status" => ProductStatus::IN_STOCK
        ];
        Product::create($product);

        $product["name"] = "Bolts 10mm";
        Product::create($product);

        $product["name"] = "Bolts 11mm";
        Product::create($product);

        $product["name"] = "Bolts 13mm";
        Product::create($product);

        $product["name"] = "Bolts 15mm";
        Product::create($product);

        $product["name"] = "Bolts 16mm";
        Product::create($product);

        $product["name"] = "Bolts 19mm";
        Product::create($product);

        $product["name"] = "Bolts 21mm";
        Product::create($product);

        $product["name"] = "Bolts 24mm";
        Product::create($product);

        $product["name"] = "Bolts 29mm";
        $product["stock"] = 0;
        $product["status"] = ProductStatus::OUT_OF_STOCK;
        Product::create($product);

        $product["name"] = "Bolts 34mm";
        $product["stock"] = 5000;
        $product["status"] = ProductStatus::IN_STOCK;
        Product::create($product);

        $product["name"] = "Bolts 38mm";
        Product::create($product);

        $product["name"] = "Bolts 43mm";
        Product::create($product);

        $product["name"] = "Bolts 48mm";
        Product::create($product);

        $product["name"] = "Bolts 53mm";
        Product::create($product);

        $product["name"] = "Bolts 58mm";
        $product["stock"] = 0;
        $product["status"] = ProductStatus::OUT_OF_STOCK;
        Product::create($product);
    }

    private function wrenches()
    {
        $product = [
            "name" => "Wrench 8mm",
            "description" => "High quality steel Wrench from Harry",
            "price" => 5,
            "stock" => 500,
            "max_capacity" => 5000,
            "status" => ProductStatus::IN_STOCK
        ];
        Product::create($product);

        $product["name"] = "Wrench 10mm";
        Product::create($product);

        $product["name"] = "Wrench 11mm";
        Product::create($product);

        $product["name"] = "Wrench 13mm";
        Product::create($product);

        $product["name"] = "Wrench 15mm";
        Product::create($product);

        $product["name"] = "Wrench 16mm";
        Product::create($product);

        $product["name"] = "Wrench 19mm";
        Product::create($product);

        $product["name"] = "Wrench 21mm";
        Product::create($product);

        $product["name"] = "Wrench 24mm";
        Product::create($product);

        $product["name"] = "Wrench 29mm";
        $product["stock"] = 0;
        $product["status"] = ProductStatus::OUT_OF_STOCK;
        Product::create($product);

        $product["name"] = "Wrench 34mm";
        $product["stock"] = 1000;
        $product["status"] = ProductStatus::IN_STOCK;
        Product::create($product);

        $product["name"] = "Wrench 38mm";
        Product::create($product);

        $product["name"] = "Wrench 43mm";
        Product::create($product);

        $product["name"] = "Wrench 48mm";
        Product::create($product);

        $product["name"] = "Wrench 53mm";
        Product::create($product);

        $product["name"] = "Wrench 58mm";
        $product["stock"] = 0;
        $product["status"] = ProductStatus::OUT_OF_STOCK;
        Product::create($product);
    }

}
