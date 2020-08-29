<?php namespace App\Repository;

interface KataRepositoryInterface extends BaseRepositoryInterface
{

    public function search($query);

    public function findByKata($word, $options);

    public function findByAkhir($word, $options);

    public function findByAkhirGanda($word, $options);

    public function findByAwal($word, $options);

    public function findByAwalGanda($word, $options);

    public function findByKonsonan($word, $options);

    public function findByVokal($word, $options);

}