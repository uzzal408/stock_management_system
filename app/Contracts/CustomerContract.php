<?php
namespace App\Contracts;


interface CustomerContract
{

    public function listCustomer(string $order='id',string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCustomerById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCustomer(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCustomer(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteCustomer(int $id);
}
