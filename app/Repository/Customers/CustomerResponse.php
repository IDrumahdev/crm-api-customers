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

    public function findAll()
    {
        $result = $this->customer->select(['id',
                                'first_name',
                                'last_name',
                                'birth_day',
                                'place_birth',
                                'email',
                                'mobilephone',
                                'address',
                                'city',
                                'country'])
                                ->latest()
                                ->paginate();
        return $result;
    }

    public function first($id)
    {
        $result = $this->customer->select(['id',
                                'first_name',
                                'last_name',
                                'birth_day',
                                'place_birth',
                                'email',
                                'mobilephone',
                                'address',
                                'city',
                                'country'])
                                ->whereId($id)
                                ->get();
        return $result;
    }

    public function update($param, $id)
    {
        $this->customer->whereId($id)->update([
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

    public function delete($id)
    {
        $result = $this->customer->find($id);
        $result->delete();
    }
}
