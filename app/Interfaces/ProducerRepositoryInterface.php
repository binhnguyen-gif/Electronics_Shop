<?php

namespace App\Interfaces;

interface ProducerRepositoryInterface {
    public function getAllProducer();
    public function createProducer(array $params);
    public function getProducerById($id);
    public function updateProducer($id, array $params);
    public function deleteProducer($id);
    public function restoreProducerById($id);
    public function foreverDeleteProducerById($id);
    public function totalTrash();

}
