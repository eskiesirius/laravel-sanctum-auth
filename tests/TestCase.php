<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        
        Artisan::call('db:seed');
    }

    protected function getAdmin()
    {
        return User::find(1);
    }

    protected function getCustomerService()
    {
        return User::find(2);
    }

    protected function getManufacturer()
    {
        return User::find(3);
    }

    protected function getCustomer()
    {
        return User::find(4);
    }

    protected function loginAsAdmin()
    {
        return $this->loginAs(config('access.role.admin'));
    }

    protected function loginAsCustomerService()
    {
        return $this->loginAs(config('access.role.customer_service'));
    }

    protected function loginAsManufacturer()
    {
        return $this->loginAs(config('access.role.manufacturer'));
    }

    protected function loginAsCustomer()
    {
        return $this->loginAs(config('access.role.customer'));
    }

    protected function loginAs($role)
    {
        if ($role == config('access.role.admin')) {
            $user = $this->getAdmin();
        } else if ($role == config('access.role.customer_service')) {
            $user = $this->getCustomerService();
        } else if ($role == config('access.role.manufacturer')) {
            $user = $this->getManufacturer();
        } else if ($role == config('access.role.customer')) {
            $user = $this->getCustomer();
        }

        Sanctum::actingAs(
            $user,
            ['*'],
            'web'
        );
        
        return $user;
    }

    protected function logout()
    {
        return auth()->logout();
    }
}
