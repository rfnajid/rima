<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
     protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
    *
    * @return array
    */
    public function all(): array
    {
        return $this->model->all();
    }

    /**
    * @param array $data
    *
    * @return Model
    */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
    * @param array $data
    * @param int $id
    *
    * @return Model
    */
    public function update(array $data, $id): ?Model
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
    * @param int $id
    *
    * @return boolean
    */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param array $fields
    * @param array query
    */
    public function where(array $fields,array $query)
    {
        if(count($fields)==0){
            return [];
        }

        $res = $this->model;
        for ($i=0; $i < count($fields); $i++) {
            $res = $res->where($fields[$i],$query[$i]);
        }

        return $res->get();
    }
}