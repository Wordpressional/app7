<?php

use App\Role;
use App\Token;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);


        $this->call(EmployeesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryProductsTableSeeder::class);
        $this->call(MyCountryTableSeeder::class);
        $this->call(MyProvincesTableSeeder::class);
        $this->call(MyCitiesTableSeeder::class);
        $this->call(USCitiesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CustomerAddressesTableSeeder::class);
        $this->call(CourierTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
        // Roles
       /* Role::firstOrCreate(['name' => Role::ROLE_EDITOR]);
       $role_admin = Role::firstOrCreate(['name' => Role::ROLE_ADMIN]);

        // Users
        if (User::where('email', 'darthvader@deathstar.ds')->doesntExist()) {
            $user = User::create([
                'name' => 'anakin',
                'email' => 'darthvader@deathstar.ds',
                'password' => '4nak1n'
            ]);

           // $user->roles()->attach($role_admin->id);
            $user->attachRole("superadministrator");
            $user->attachRole("ROLE_ADMIN");
            $user->attachRole("ROLE_EDITOR");
        }

        // API tokens
        User::where('api_token', null)->get()->each->update([
            'api_token' => Token::generate()
        ]);
*/
        
    }
}
