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
    public function get($options)
    {
        return $this->where($options);
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
    * @param array options (select,field, query, distinct, not_in, size,pagination,request)
    */
    public function where(array $options = [])
    {
        // default
        $size = 20;
        $model = $this->model;

        // no options
        if(!is_array($options) || count($options)<=0){
            return $model->paginate($size);
        }

        // with options
        if(isset($options['select'])){
            $model = $model->select($options['select']);
        }

        if(isset($options['where']) && isset($options['where']['field']) && isset($options['where']['query'])){
            $field = $options['where']['field'];
            $query = $options['where']['query'];

            for ($i=0; $i < count($field); $i++) {
                $model = $model->where($field[$i],$query[$i]);
            }
        }

        if(isset($options['distinct'])){
            $model = $model->distinct($options['distinct']);
        }

        if(isset($options['not_in'])){
            $model = $model->whereNotIn($options['not_in']['field'], $options['not_in']['values']);
        }

        if(isset($options['like'])){
            $model = $model->orWhere($options['like']['field'],'like','%'.$options['like']['query'].'%');
        }

        if(isset($options['size'])){
            $size = $options['size'];
            if($size == 'all'){
                $size = $model->count();
            }
        }

        $model = $model->paginate($size);

        // paginator options
        if(isset($options['request'])){
            $request = $options['request'];
            $model = $model->setPath($request->url());
            $model = $model->appends($request->input());
        }

        return $model;
    }
}