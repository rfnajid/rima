<?php

namespace App\Http\Controllers\ApiControllers\V1Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Database\Eloquent\Model;
use App\Model\Kata;
use App\Helpers\GlobalHelper;
use Illuminate\Http\Request;
use App\Repository\PantunRepositoryInterface;
use DanBovey\LinkHeaderPaginator\LengthAwarePaginator;

/**
 * @group  API Kamus
 *
 * API untuk mendapatkan arti kata
 */
class PantunController extends BaseController
{
    private $repo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PantunRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(){
        return $this->repo->getSampiran('tes');
    }

    public function karmina(Request $request){
        $pantun = $request->json()->all();
        $pantun['sampiran'] = $this->repo->getSampiran($pantun['isi']);

        return $pantun;
    }
}