<?php

namespace App\Repository\Customers;

interface CustomersDesign
{
    public function store($param);
    public function findAll();
    public function first($id);
    public function update($param, $id);
    public function delete($id);
}
