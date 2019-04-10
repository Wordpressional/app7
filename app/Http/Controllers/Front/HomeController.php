<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    
        $this->categoryRepo = $categoryRepository;
        
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);

        return view('front.index', compact('cat1', 'cat2'));
    }

    public function index1()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);

        return view('layoutsecom.front.menu', compact('cat1', 'cat2'));
    }

    public function index2()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);

        return view('layoutsecom.front.home-slider', compact('cat1', 'cat2'));
    }

    public function index3()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);

        return view('front.productslistfront', compact('cat1', 'cat2'));
    }

    public function index4()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);

        return view('layoutsecom.front.myfooter', compact('cat1', 'cat2'));
    }

    public function index31()
    {

        $cat0 = $this->categoryRepo->findCategoryBySlug(['slug' => 'static-themes']);

        $cat1 = $this->categoryRepo->findCategoryBySlug(['slug' => 'hospital-and-clinic']);
        $cat2 = $this->categoryRepo->findCategoryBySlug(['slug' => 'travel']);
        $cat3 = $this->categoryRepo->findCategoryBySlug(['slug' => 'hotels-and-resturant']);
        $cat4 = $this->categoryRepo->findCategoryBySlug(['slug' => 'personal']);
        $cat5 = $this->categoryRepo->findCategoryBySlug(['slug' => 'construction']);
        $cat6 = $this->categoryRepo->findCategoryBySlug(['slug' => 'business-and-profession']);
        $cat7 = $this->categoryRepo->findCategoryBySlug(['slug' => 'arts-and-leisure']);
        $cat8 = $this->categoryRepo->findCategoryBySlug(['slug' => 'education']);
        $cat9 = $this->categoryRepo->findCategoryBySlug(['slug' => 'retail']);


        //dd($cat1);
        $products0 = $cat0->products->where('status', 1);
        //dd($products1);
        $imarr0 = array();
        foreach($products0 as $spro0)
        {
        $product0 = $this->productRepo->findProductBySlug(['slug' => $spro0->slug]);
        $mimage0 = $product0->images()->first();
         array_push($imarr0, $mimage0);
        }


        //dd($cat1);
        $products1 = $cat1->products->where('status', 1);
        //dd($products1);
        $imarr1 = array();
        foreach($products1 as $spro1)
        {
        $product1 = $this->productRepo->findProductBySlug(['slug' => $spro1->slug]);
        $mimage1 = $product1->images()->first();
         array_push($imarr1, $mimage1);
        }

        //dd($cat1);
        $products2 = $cat2->products->where('status', 1);
        //dd($products1);
        $imarr2 = array();
        foreach($products2 as $spro2)
        {
        $product2 = $this->productRepo->findProductBySlug(['slug' => $spro2->slug]);
        $mimage2 = $product2->images()->first();
         array_push($imarr2, $mimage2);
        }

        //dd($cat1);
        $products3 = $cat3->products->where('status', 1);
        //dd($products1);
        $imarr3 = array();
        foreach($products3 as $spro3)
        {
        $product3 = $this->productRepo->findProductBySlug(['slug' => $spro3->slug]);
        $mimage3 = $product3->images()->first();
         array_push($imarr3, $mimage3);
        }

        //dd($cat1);
        $products4 = $cat4->products->where('status', 1);
        //dd($products1);
        $imarr4 = array();
        foreach($products4 as $spro4)
        {
        $product4 = $this->productRepo->findProductBySlug(['slug' => $spro4->slug]);
        $mimage4 = $product4->images()->first();
         array_push($imarr4, $mimage4);
        }

        //dd($cat1);
        $products5 = $cat5->products->where('status', 1);
        //dd($products1);
        $imarr5 = array();
        foreach($products5 as $spro5)
        {
        $product5 = $this->productRepo->findProductBySlug(['slug' => $spro5->slug]);
        $mimage5 = $product5->images()->first();
         array_push($imarr5, $mimage5);
        }

        //dd($cat1);
        $products6 = $cat6->products->where('status', 1);
        //dd($products1);
        $imarr6 = array();
        foreach($products6 as $spro6)
        {
        $product6 = $this->productRepo->findProductBySlug(['slug' => $spro6->slug]);
        $mimage6 = $product6->images()->first();
         array_push($imarr6, $mimage6);
        }


        //dd($cat1);
        $products7 = $cat7->products->where('status', 1);
        //dd($products1);
        $imarr7 = array();
        foreach($products7 as $spro7)
        {
        $product7 = $this->productRepo->findProductBySlug(['slug' => $spro7->slug]);
        $mimage7 = $product7->images()->first();
         array_push($imarr7, $mimage7);
        }


        //dd($cat1);
        $products8 = $cat8->products->where('status', 1);
        //dd($products1);
        $imarr8 = array();
        foreach($products8 as $spro8)
        {
        $product8 = $this->productRepo->findProductBySlug(['slug' => $spro8->slug]);
        $mimage8 = $product8->images()->first();
         array_push($imarr8, $mimage8);
        }

        //dd($cat1);
        $products9 = $cat9->products->where('status', 1);
        //dd($products1);
        $imarr9 = array();
        foreach($products9 as $spro9)
        {
        $product9 = $this->productRepo->findProductBySlug(['slug' => $spro9->slug]);
        $mimage9 = $product9->images()->first();
         array_push($imarr9, $mimage9);
        }
        //$images = $product->images()->get();
        
        //dd($imarr);
        return view('front.shopthemes', compact('products0', 'products1', 'products2', 'products3', 'products4', 'products5', 'products6', 'products7', 'products8', 'products9','cat0', 'cat1', 'cat2', 'cat3', 'cat4', 'cat5', 'cat6', 'cat7', 'cat8', 'cat9', 'imarr0', 'imarr1', 'imarr2', 'imarr3', 'imarr4', 'imarr5', 'imarr6', 'imarr7', 'imarr8', 'imarr9'));
    }
    
}
