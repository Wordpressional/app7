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
        }
        else
        {
            $custtheme = null;
        }
       // dd($custtheme);

        return view('front.accountse1', [
            'customer' => $customer,
            'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses,
            'myorders' => $myorders,
            'custtheme' => $custtheme
        ]);
    }
}
