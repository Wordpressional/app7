<?php

namespace App\Http\Controllers\Front;

use App\Shop\Carts\Requests\AddToCartRequest;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\ProductAttributes\Repositories\ProductAttributeRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Repositories\ProductRepository;
use App\Shop\Products\Transformations\ProductTransformable;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

use App\Shop\Orders\Repositories\Interfaces\OrderRepositoryInterface;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;

use App\User;
use App\Custtheme;

class CartController extends Controller
{
    use ProductTransformable;

    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * @var ProductAttributeRepositoryInterface
     */
    private $productAttributeRepo;

    private $categoryRepo;
    private $orderRepo;
   
    private $custRepo;

    /**
     * CartController constructor.
     * @param CartRepositoryInterface $cartRepository
     * @param ProductRepositoryInterface $productRepository
     * @param CourierRepositoryInterface $courierRepository
     * @param ProductAttributeRepositoryInterface $productAttributeRepository
     */
    public function __construct(
        CartRepositoryInterface $cartRepository,
        ProductRepositoryInterface $productRepository,
        CourierRepositoryInterface $courierRepository,
        ProductAttributeRepositoryInterface $productAttributeRepository,
    OrderRepositoryInterface $orderRepository, CustomerRepositoryInterface $customerRepository, CategoryRepositoryInterface $categoryRepository
    ) {
        $this->cartRepo = $cartRepository;
        $this->productRepo = $productRepository;
        $this->courierRepo = $courierRepository;
        $this->productAttributeRepo = $productAttributeRepository;
        $this->orderRepo = $orderRepository;
        $this->categoryRepo = $categoryRepository;
        $this->custRepo = $customerRepository;
    }




    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = $this->courierRepo->findCourierById(request()->session()->get('courierId', 1));
        $shippingFee = $this->cartRepo->getShippingFee($courier);

        return view('front.carts.cart', [
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            'shippingFee' => $shippingFee,
            'total' => $this->cartRepo->getTotal(2, $shippingFee)
        ]);
    }

    public function cart1(Request $request)
    {
        //dd($request->input('a'));
        //dd("l");
        if(auth::guard('checkout')->check())
         {
            $customer = $this->custRepo->findCustomerById(Auth::guard('checkout')->id());

            $startuppro = $this->productRepo->findProductBySlug(['slug' => 'start-up']);
            //dd($startuppro->id);
            $olist = $this->orderRepo->listOrders('created_at', 'desc')->where('customer_id', $customer->id);

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

           
         //dd($olist);
       
         if(!$olist->isEmpty())
         {
            
            if($custtheme)
            {
        
                $courier = $this->courierRepo->findCourierById(request()->session()->get('courierId', 1));
                $shippingFee = $this->cartRepo->getShippingFee($courier);

                return view('front.carts.cart1', [
                    'cartItems' => $this->cartRepo->getCartItemsTransformed(),
                    'subtotal' => $this->cartRepo->getSubTotal(),
                    'tax' => $this->cartRepo->getTax(),
                    'shippingFee' => $shippingFee,
                    'total' => $this->cartRepo->getTotal(2, $shippingFee)
                ]);
            }
            else
            {
                $this->cartRepo->clearCart();
                return redirect('/accountse1/?tab=profile')->with("message","Create Demo Account First");
            }
        }
        else if($request->input('package') == "startup")
        {
            
            if(!$custtheme)
            {
                $courier = $this->courierRepo->findCourierById(request()->session()->get('courierId', 1));
                $shippingFee = $this->cartRepo->getShippingFee($courier);

            return view('front.carts.cart1', [
                'cartItems' => $this->cartRepo->getCartItemsTransformed(),
                'subtotal' => $this->cartRepo->getSubTotal(),
                'tax' => $this->cartRepo->getTax(),
                'shippingFee' => $shippingFee,
                'total' => $this->cartRepo->getTotal(2, $shippingFee)
            ]);
            }
            else
            {
                $this->cartRepo->clearCart();
                
            }

        } 
        else
        {

            $this->cartRepo->clearCart();

           
            return redirect('/landingsitepage/pypricing')->with("message","Select your Package");
        }
        }
        else
        {
            return redirect()->route('cart.custe1login');
        }



    }

     public function cartp1()
    {
       //dd("l");
        $courier = $this->courierRepo->findCourierById(request()->session()->get('courierId', 1));
        $shippingFee = $this->cartRepo->getShippingFee($courier);

        return view('front.carts.cartp1', [
            'cartItems' => $this->cartRepo->getCartItemsTransformed(),
            'subtotal' => $this->cartRepo->getSubTotal(),
            'tax' => $this->cartRepo->getTax(),
            'shippingFee' => $shippingFee,
            'total' => $this->cartRepo->getTotal(2, $shippingFee)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddToCartRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddToCartRequest $request)
    {

      
        $product = $this->productRepo->findProductById($request->input('product'));

        if ($product->attributes()->count() > 0) {
            $productAttr = $product->attributes()->where('default', 1)->first();

            if (isset($productAttr->sale_price)) {
                $product->price = $productAttr->price;

                if (!is_null($productAttr->sale_price)) {
                    $product->price = $productAttr->sale_price;
                }
            }
        }

        $options = [];
        if ($request->has('productAttribute')) {

            $attr = $this->productAttributeRepo->findProductAttributeById($request->input('productAttribute'));
            $product->price = $attr->price;

            $options['product_attribute_id'] = $request->input('productAttribute');
            $options['combination'] = $attr->attributesValues->toArray();
        }

        $this->cartRepo->addToCart($product, $request->input('quantity'), $options);

        return redirect()->route('cart.index')
            ->with('message', 'Add to cart successful');
        
       

    }

    public function cart1store(AddToCartRequest $request)
    {
     
       
        $product = $this->productRepo->findProductById($request->input('product'));
       
        if ($product->attributes()->count() > 0) {
            $productAttr = $product->attributes()->where('default', 1)->first();

            if (isset($productAttr->sale_price)) {
                $product->price = $productAttr->price;

                if (!is_null($productAttr->sale_price)) {
                    $product->price = $productAttr->sale_price;
                }
            }
        }

        $options = [];
        if ($request->has('productAttribute')) {

            $attr = $this->productAttributeRepo->findProductAttributeById($request->input('productAttribute'));
            $product->price = $attr->price;

            $options['product_attribute_id'] = $request->input('productAttribute');
            $options['combination'] = $attr->attributesValues->toArray();
        }

            
        //dd($product);
        if($request->input('package') == "startup")
        {
            $this->cartRepo->clearCart();
             $this->cartRepo->addToCart($product, $request->input('quantity'), $options);
        return redirect()->route('cart.cart1', ['package' => 'startup'])
            ->with('message', 'Add to cart successful');
        }
        else
        {


             $this->cartRepo->addToCart($product, $request->input('quantity'), $options);
       

            return redirect()->route('cart.cart1')
            ->with('message', 'Add to cart successful');
        }
        
    }

     public function cartp1store(AddToCartRequest $request)
    {
        $product = $this->productRepo->findProductById($request->input('product'));

        if ($product->attributes()->count() > 0) {
            $productAttr = $product->attributes()->where('default', 1)->first();

            if (isset($productAttr->sale_price)) {
                $product->price = $productAttr->price;

                if (!is_null($productAttr->sale_price)) {
                    $product->price = $productAttr->sale_price;
                }
            }
        }

        $options = [];
        

        $this->cartRepo->addToCart($product, $request->input('quantity'), $options);
        //dd($product);

        return redirect()->route('cart.cartp1')
            ->with('message', 'Add to cart successful');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->cartRepo->updateQuantityInCart($id, $request->input('quantity'));

        request()->session()->flash('message', 'Update cart successful');
        return redirect()->route('cart.index');
    }

    public function cart1update(Request $request, $id)
    {
        $this->cartRepo->updateQuantityInCart($id, $request->input('quantity'));

        request()->session()->flash('message', 'Update cart successful');
        return redirect()->route('cart.cart1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cartRepo->removeToCart($id);

        request()->session()->flash('message', 'Removed to cart successful');
        return redirect()->route('cart.index');
    }

    public function cart1destroy($id)
    {
        $this->cartRepo->removeToCart($id);

        request()->session()->flash('message', 'Removed to cart successful');
        return redirect()->route('cart.cart1');
    }
}
