<?php

namespace App\Repositories;

use App\Interfaces\ProducerRepositoryInterface;
use App\Models\Category;
use App\Models\Producer;

class ProducerRepository implements ProducerRepositoryInterface
{
    public function getAllProducer()
    {
        return Producer::query()->get();
    }

    public function createProducer(array $params)
    {
        return Producer::create($params);
    }

    public function getProducerById($id)
    {
        $category = Producer::query()->where('id', $id)->first();
        return $category;
    }

    public function updateProducer($id, array $params)
    {
        return Producer::whereId($id)->update($params);
    }

    public function restoreProducerById($id)
    {
        return Producer::withTrashed()->whereId($id)->restore();
    }

    public function foreverDeleteProducerById($id)
    {
        return Producer::withTrashed()->whereId($id)->forceDelete();
    }

    public function totalTrash()
    {
        return Category::onlyTrashed()->count();
    }
}
