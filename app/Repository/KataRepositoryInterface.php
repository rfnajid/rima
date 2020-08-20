<?php namespace App\Repository;

interface KataRepositoryInterface extends BaseRepositoryInterface
{
    public function findByAkhir($word);

    public function findByAkhirParsial($word);

    public function findByAkhirGanda($word);

    public function findByAkhirGandaParsial($word);

    public function findByAwal($word);

    public function findByAwalParsial($word);

    public function findByKonsonan($word);
}