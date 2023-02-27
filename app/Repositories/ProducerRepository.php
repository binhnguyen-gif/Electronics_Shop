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
        return Producer::query()->whereId($id)->first();
    }

    public function updateProducer($id, array $params)
    {
        return Producer::whereId($id)->update($params);
    }

    public function deleteProducer($id){
        return Producer::destroy($id);
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
        return Producer::onlyTrashed()->count();
    }
}
