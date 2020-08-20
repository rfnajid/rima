<?php namespace App\Repository;

interface KataRepositoryInterface extends BaseRepositoryInterface
{

    public function findByKata($word);

    public function findByAkhir($word);

    public function findByAkhirGanda($word);

    public function findByAwal($word);

    public function findByAwalGanda($word);

    public function findByKonsonan($word);

    public function findByVokal($word);

}