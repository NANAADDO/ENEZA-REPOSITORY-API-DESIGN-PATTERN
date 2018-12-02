<?php

namespace App\Repositories\Contracts;

interface QuizAnswersRepository
{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function update($id,array $attributes);
    public function delete($id);
}
