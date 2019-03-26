<?php

namespace App\Http\Controllers\Admin\Countries;

use App\Shop\Countries\Repositories\CountryRepository;
use App\Shop\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Shop\Countries\Requests\UpdateCountryRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\EcommTrait;

class CountryController extends Controller
{
    use EcommTrait;
    private $countryRepo;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepo = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->ebrandsAll();
        $list = $this->countryRepo->listCountries('created_at', 'desc');

        return view('admin.countries.list', [
            'countries' => $this->countryRepo->paginateArrayResults($list->all(), 10), 'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $data = $this->ebrandsAll();
        $country = $this->countryRepo->findCountryById($id);
        $countryRepo = new CountryRepository($country);
        $provinces = $countryRepo->findProvinces();

        return view('admin.countries.show', [
            'country' => $country,
            'provinces' => $this->countryRepo->paginateArrayResults($provinces->toArray()), 'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->ebrandsAll();
        return view('admin.countries.edit', ['country' => $this->countryRepo->findCountryById($id), 'data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCountryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, $id)
    {
        $country = $this->countryRepo->findCountryById($id);

        $update = new CountryRepository($country);
        $update->updateCountry($request->except('_method', '_token'));

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.countries.edit', $id);
    }
}
