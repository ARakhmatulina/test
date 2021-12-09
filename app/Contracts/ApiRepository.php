<?php

namespace App\Contracts;

interface ApiRepository
{

    public function getAll(array $filters = []);

    public function getById(int $id);
}
