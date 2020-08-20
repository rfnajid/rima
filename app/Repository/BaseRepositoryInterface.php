<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
* Interface BaseRepositoryInterface
* @package App\Repository
*/
interface BaseRepositoryInterface
{
   /**
    *
    * @return array
    */
    public function all(): array;

   /**
    * @param array $data
    *
    * @return Model
    */
    public function create(array $data): Model;

    /**
    * @param array $data
    * @param int $id
    *
    * @return Model
    */
    public function update(array $data, $id): ?Model;

    /**
    * @param int $id
    *
    * @return boolean
    */
    public function delete($id);

    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model;

    /**
    * @param array $fields
    * @param array query
    * @param array options
    */
    public function where(array $fields,array $query, array $options);
}
