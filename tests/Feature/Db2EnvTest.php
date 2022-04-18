<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class Db2EnvTest extends TestCase
{

    protected function tearDown(): void
    {
        Product::whereNotNull('id')->delete();
    }

    /**
     * Test if we can connect to the database
     *
     * @return void
     */
    public function testConnection(): void
    {
        Product::factory()->count(5)->create();

        $products = Product::get();
        $this->assertTrue(count($products) > 0);
    }

    /**
     * Test if we can check for null values without SQL-length
     *
     * @return void
     */
    public function testNullChecks(): void
    {
        Product::factory()->count(5)->create();
        Product::factory()->count(5)->noCapacityLimits()->create();
        Product::factory()->count(5)->noImageStyles()->create();

        $total = Product::count();

        $this->integerNullCheck($total);
        $this->stringNullCheck($total);
    }

    private function integerNullCheck(int $total) : void
    {
        $noMaxCapacityOld = Product::where('length(max_capacity)', '>', 0)->count();
        $noMaxCapacityNew = Product::whereNotNull('max_capacity')->count();
        $maxCapacities = Product::whereNull('max_capacity')->count();

        $this->assertNotEquals(0, $noMaxCapacityOld);
        $this->assertEquals($noMaxCapacityOld, $noMaxCapacityNew);
        $this->assertEquals($total, $noMaxCapacityNew + $maxCapacities);
    }

    private function stringNullCheck(int $total) : void
    {
        $noImageStyleOld = Product::where('length(trim(image_styling))', '>', 0)->count();
        $noImageStyleNew = Product::whereNotNull('image_styling')->count();
        $imageStyles = Product::whereNull('image_styling')->count();

        $this->assertNotEquals(0, $noImageStyleOld);
        $this->assertEquals($noImageStyleOld, $noImageStyleNew);
        $this->assertEquals($total, $noImageStyleNew + $imageStyles);
    }

    /**
     * Test to check if the database is in UTF-8 charset
     *
     * Is this test representative???
     * @return void
     */
    public function testCharset() : void
    {
        $product = Product::factory()->make();
        $chars = "&|é@#§êèçàëü*$%ùµ£=+~:/;.,?";
        $product->name = $chars;
        $product->save();

        $this->assertEquals($chars, Product::find($product->id)->name);
        $this->assertEquals($chars, utf8_encode(Product::find($product->id)->name));
    }
}
