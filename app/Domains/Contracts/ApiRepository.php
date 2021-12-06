<?php

namespace App\Domains\Contracts;

interface ApiRepository
{

    public function getAll();

    public function getById(int $id);
}
