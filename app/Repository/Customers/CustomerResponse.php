<?php

namespace App\Repository\Customers;

use App\Models\customer;
use App\Repository\Customers\CustomersDesign;

class CustomerResponse implements CustomersDesign
{
    protected $customer;
    public function __construct(customer $customer)
    {
        $this->customer = $customer;
    }

    public function store($param) {
        $this->customer->create([
            'first_name'    =>$param->first_name,
            'last_name'     =>$param->last_name,
            'birth_day'     =>$param->birth_day,
            'place_birth'   =>$param->place_birth,
            'email'         =>$param->email,
            'mobilephone'   =>$param->mobilephone,
            'address'       =>$param->address,
            'city'          =>$param->city,
            'country'       =>$param->country
        ]); 
    }
}
