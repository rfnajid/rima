<?php

namespace App\Repository\Eloquent;

use App\Model\LogPantun;
use App\Repository\LogPantunRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LogPantunRepository extends BaseRepository implements LogPantunRepositoryInterface
{

    public function __construct(LogPantun $model)
    {
        parent::__construct($model);
    }

    public function save($input, $output){
        $logPantun = ['input' => $input, 'output' => $output];
        return parent::create($logPantun);
    }
}