<?php
namespace App\Contracts;

/**
 * Interface AboutContract
 * @package App\Contracts
 */
interface CategoryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategory(string $order='id',string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCategory(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteCategory(int $id);
}
