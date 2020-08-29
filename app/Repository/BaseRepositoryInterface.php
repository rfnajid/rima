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
    public function get($options);

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
    * @param array options (select,field, query, distinct, not_in, size, search,request)
    */
    public function where(array $options);
}
