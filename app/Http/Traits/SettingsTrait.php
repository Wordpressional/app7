<?php
namespace App\Http\Traits;

use App\Brand;




trait SettingsTrait {
    public function settingsAll() {
        // Get all the brands from the Brands Table.
       
        $data = [];
        
         $n_companyname = Brand::where('id',1)->first();
        $data = [
           
            'n_companyname' => $n_companyname,

        ];
        //$this->data = $data;
        //dd($this->data);
        return $data;
    }
}