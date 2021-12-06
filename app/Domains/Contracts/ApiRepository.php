<?php

namespace App\Domains\Contracts;

interface ApiRepository
{

    public function getAll(array $filters = []);

    public function getById(int $id);
}
