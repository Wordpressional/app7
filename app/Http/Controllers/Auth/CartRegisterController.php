<?php

namespace App\Http\Controllers\Auth;

use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Customers\Requests\CreateCustomerRequest;
use App\Shop\Customers\Requests\RegisterCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Role;
use App\Theme;
use App\Custtheme;

class CartRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/accounts';

    private $customerRepo;

    /**
     * Create a new controller instance.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->middleware('guest');
        $this->customerRepo = $customerRepository;
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {
        return $this->customerRepo->createCustomer($data);
    }

    /**
     * @param RegisterCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterCustomerRequest $request)
    {
        $customer = $this->create($request->except('_method', '_token'));
        Auth::login($customer);

        return redirect()->route('accounts');
    }

    public function registere1(RegisterCustomerRequest $request)
    {
        $customer = $this->create($request->except('_method', '_token'));
        //Auth::login($customer);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $role = Role::where('name', 'cust_demo')->first();
        $user->roles()->attach($role, ['user_type'=>'App/User']);

        $mytheme = Theme::where('tname', 'Personal Theme - T2')->first();

        $ctheme = new Custtheme;
        $ctheme->tname = $mytheme->tname;
        $ctheme->tcontent = $mytheme->tcontent;

        $ctheme->tstatus = "inactive";
        $ctheme->custid = $user->id;

        $ctheme->save();
        
        $customer->users()->attach($user->id);
        
        return redirect()->route('cart.custe1login');
    }

     public function cartregister()
    {        
         return view('auth.cart.register');
       
    }
    public function cartregistere1form()
    {        
         return view('auth.cart.registere1');
       
    }
}
