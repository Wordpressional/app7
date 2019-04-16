<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Addresses\Requests\CreateAddressRequest;
use App\Shop\Addresses\Requests\UpdateAddressRequest;
use App\Shop\Addresses\Repositories\AddressRepository;
use App\Shop\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Shop\Addresses\Repositories\Interfaces\AddressRepositoryInterface;
use App\Shop\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Shop\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use Auth;

class CustomerAddressController extends Controller
{
    /**
     * @var AddressRepositoryInterface
     */
    private $addressRepo;

    /**
     * @var CountryRepositoryInterface
     */
    private $countryRepo;

    /**
     * @var CityRepositoryInterface
     */
    private $cityRepo;

    /**
     * @var ProvinceRepositoryInterface
     */
    private $provinceRepo;


    /**
     * @param AddressRepositoryInterface  $addressRepository 
     * @param CountryRepositoryInterface  $countryRepository 
     * @param CityRepositoryInterface     $cityRepository    
     * @param ProvinceRepositoryInterface $provinceRepository
     */
    public function __construct(
        AddressRepositoryInterface $addressRepository,
        CountryRepositoryInterface $countryRepository,
        CityRepositoryInterface $cityRepository,
        ProvinceRepositoryInterface $provinceRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->addressRepo = $addressRepository;
        $this->countryRepo = $countryRepository;
        $this->provinceRepo = $provinceRepository;
        $this->cityRepo = $cityRepository;
        $this->customerRepo = $customerRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customer = $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());

        return view('front.customers.addresses.list', [
            'customer' => $customer,
            'addresses' => $customer->addresses
        ]);
    }

    /**
     * @param  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $customer = $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());

        return view('front.customers.addresses.create', [
            'customer' => $customer,
            'countries' => $this->countryRepo->listCountries(),
            'cities' => $this->cityRepo->listCities(),
            'provinces' => $this->provinceRepo->listProvinces()
        ]);
    }

     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexe1()
    {
        $customer = $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());

        return view('front.customers.addresses.list', [
            'customer' => $customer,
            'addresses' => $customer->addresses
        ]);
    }

    /**
     * @param  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createe1()
    {
        $customer = $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());

        return view('front.customers.addresses.createe1', [
            'customer' => $customer,
            'countries' => $this->countryRepo->listCountries(),
            'cities' => $this->cityRepo->listCities(),
            'provinces' => $this->provinceRepo->listProvinces()
        ]);
    }

    /**
     * @param CreateAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAddressRequest $request)
    {
        $request['customer_id'] =  $this->customerRepo->findCustomerById(Auth::guard('checkout')->id());

        $this->addressRepo->createAddress($request->except('_token', '_method'));

        return redirect()->route('accounts', ['tab' => 'address'])
            ->with('message', 'Address creation successful');
    }

    /**
     * @param $addressId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($customerId, $addressId)
    {
        $countries = $this->countryRepo->listCountries();

        $address = $this->addressRepo->findCustomerAddressById($addressId, $this->customerRepo->findCustomerById(Auth::guard('checkout')->id()));

        return view('front.customers.addresses.edit', [
            'customer' =>  $this->customerRepo->findCustomerById(Auth::guard('checkout')->id()),
            'address' => $address,
            'countries' => $countries,
            'cities' => $this->cityRepo->listCities(),
            'provinces' => $this->provinceRepo->listProvinces()
        ]);
    }

    /**
     * @param UpdateAddressRequest $request
     * @param $addressId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAddressRequest $request, $addressId)
    {
        $address = $this->addressRepo->findCustomerAddressById((int) $request['address_id'], $this->customerRepo->findCustomerById(Auth::guard('checkout')->id()));
        
        $request = $request->except('_token', '_method');
        

        $addressRepo = new AddressRepository($address);
        $addressRepo->updateAddress($request);

        return redirect()->route('accounts', ['tab' => 'address'])
            ->with('message', 'Address update successful');
    }

    /**
     * @param $addressId
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($customerId, $addressId)
    {
        $address = $this->addressRepo->findCustomerAddressById($addressId, $this->customerRepo->findCustomerById(Auth::guard('checkout')->id()));

        $address->delete();

        return redirect()->route('customer.address.index', $customerId)
            ->with('message', 'Address delete successful');
    }
}
