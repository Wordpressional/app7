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
        $cat1 = $this->categoryRepo->findCategoryById(4);
        $cat2 = $this->categoryRepo->findCategoryById(3);
        //dd($cat1);
        $products1 = $cat1->products->where('status', 1);
        //dd($products1);
        $imarr = array();
        foreach($products1 as $spro1)
        {
        $product = $this->productRepo->findProductBySlug(['slug' => $spro1->slug]);
        $mimage1 = $product->images()->first();
         array_push($imarr, $mimage1);
        }
        //$images = $product->images()->get();
        
        //dd($imarr);
        return view('front.shopthemes', compact('products1', 'cat1', 'imarr'));
    }
    
}
