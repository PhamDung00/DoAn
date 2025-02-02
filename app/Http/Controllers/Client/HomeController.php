<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $product;
    protected $category;
    public function __construct(Product $product, Category $category)
    {
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products =  $this->product->latest('id')->paginate(8);
        
        return view('client.home.index', compact('products'));
    }
}