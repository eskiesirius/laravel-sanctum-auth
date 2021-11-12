<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $user = User::create([
            'name' => 'Super Admin',
            'tel' => '09101111111',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'email_verified_at' => now(),
        ]);
        
        $user->assignRole(config('access.role.admin'));

        $user = User::create([
            'name' => 'Super Customer Service',
            'tel' => '09101111111',
            'email' => 'service@service.com',
            'password' => 'secret',
            'email_verified_at' => now(),
        ]);
        
        $user->assignRole(config('access.role.customer_service'));

        $user = User::create([
            'name' => 'Super Manufacturer',
            'tel' => '09101111111',
            'email' => 'manufacturer@manufacturer.com',
            'password' => 'secret',
            'email_verified_at' => now(),
        ]);
        
        $user->assignRole(config('access.role.manufacturer'));

        $user = User::create([
            'name' => 'Super Customer',
            'tel' => '09101111111',
            'email' => 'customer@customer.com',
            'password' => 'secret',
            'email_verified_at' => now(),
        ]);
        
        $user->assignRole(config('access.role.customer'));

        $this->enableForeignKeys();
    }
}
