<?php

namespace App\Repositories\Contracts;

interface ContentRepository
{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function update($id,array $attributes);
    public function delete($id);
    public function getContentBySubjectId($id);
}
