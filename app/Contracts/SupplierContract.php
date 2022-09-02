<?php
namespace App\Contracts;


interface SupplierContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSupplier(string $order='id',string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSupplierById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSupplier(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSupplier(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteSupplier(int $id);
}
