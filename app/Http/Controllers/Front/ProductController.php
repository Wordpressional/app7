<?php

namespace App\Http\Controllers\Front;

use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Products\Transformations\ProductTransformable;

use App\Shop\Customers\Customer;
use App\User;
use App\Custtheme;

use Auth;

class ProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->productRepo->searchProduct(request()->input('q'));
        } else {
            $list = $this->productRepo->listProducts();
        }

        $products = $list->where('status', 1)->map(function (Product $item) {
            return $this->transformProduct($item);
        });

        return view('front.products.product-search', [
            'products' => $this->productRepo->paginateArrayResults($products->all(), 10)
        ]);
    }

    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(string $slug)
    {
        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);
        $images = $product->images()->get();
        $category = $product->categories()->first();
        $productAttributes = $product->attributes;

        return view('front.products.product', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'combos'
        ));
    }

    public function themeshow(string $slug)
    {
        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);
        $images = $product->images()->get();
        $category = $product->categories()->first();
        $productAttributes = $product->attributes;
        //dd($category);
        return view('front.products.themeproduct', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'combos'
        ));
    }

    public function packageshow(string $slug)
    {
        $product = $this->productRepo->findProductBySlug(['slug' => 'start-up']);
        $images = $product->images()->get();
        $category = $product->categories()->first();
        $productAttributes = $product->attributes;
        //dd($category);

        if(auth::guard('checkout')->check())
         {
            $customer = Customer::where('id',Auth::guard('checkout')->id())->first();
        
        $user = User::where('email', $customer->email)->first();
        //dd($user);
        if(!$user)
        {
            $custtheme = null;
        }
        else
        {
            $custtheme = Custtheme::where('custid', $user->id)->first();
        }
        }
        else
        {
           $notlogged = "false";
           return redirect('/cart/custe1login');
        }
        
        if($custtheme && $notlogged == "false")
        {
                       
            return redirect('/landingsitepage/pypricing')->with("message","You have already purchased this package");
        } 
        else
        {
            return view('front.products.themepackage', compact(
            'product',
            'images',
            'productAttributes',
            'category',
            'combos',
            'custtheme'
            ));
        }
        
        
    }
}
