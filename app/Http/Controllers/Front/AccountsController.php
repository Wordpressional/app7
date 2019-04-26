<?php

namespace App\Http\Controllers\Front;

use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Orders\Order;
use App\Shop\Orders\Transformers\OrderTransformable;
use Auth;
use App\Custtheme;
use App\User;

class AccountsController extends Controller
{
    use OrderTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepo = $customerRepository;
        $this->courierRepo = $courierRepository;
    }

    public function index()
    {
        //dd($this->customerRepo->findCustomerById(15));
        //dd(Auth::guard('checkout')->id());
        $customer = $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());
        //dd($customer);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders(['*'], 'created_at');

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $addresses = $customerRepo->findAddresses();

        return view('front.accounts', [
            'customer' => $customer,
            'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses
        ]);
    }

    public function indexe1()
    {
        $orderqueryarray = array();
        //dd($this->customerRepo->findCustomerById(15));
        //dd(Auth::guard('checkout')->id());
        $customer = $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());
        //dd($customer);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders(['*'], 'created_at');

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $addresses = $customerRepo->findAddresses();

        $myorders =  $customerRepo->findOrders(['*'], 'created_at');

        
        $user = User::where('email', $customer->email)->first();
         //dd($customer->email);
        if($user)
        {
          $custtheme = Custtheme::where('custid', $user->id)->first();
          $custthemes = Custtheme::where('custid', $user->id)->get();
        }
        else
        {
            $custtheme = "not present";
            $custthemes = null;
        }
        
        $orderss = Order::with('products')->where('customer_id', $customer->id)->get();
        foreach($orderss as $order)
        {
        $orderid = $order->id; 
        $orderquery = Order::whereHas('products', function ($q) use ($orderid) {
                $q->where('order_id', $orderid);
            })->with('products')->get();
        array_push($orderqueryarray, $orderquery);
        }
        //dd($orderqueryarray[0][0]->products[0]);
        $orderscust = $this->customerRepo->paginateArrayResults($orders->toArray(), 15);
        //dd($orderscust);

        //dd($custtheme->custid);

        return view('front.accountse1', [
            'customer' => $customer,
            'orders' => $orderscust,
            'qorders' => $orderqueryarray,
            'addresses' => $addresses,
            'myorders' => $myorders,
            'custtheme' => $custtheme,
            'custthemes' => $custthemes,
             'user' => $user
        ]);
    }
}
