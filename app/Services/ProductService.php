<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class ProductService
{
    /**
     * @var ProductRepository
     */
    protected ProductRepository $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->productRepository->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): mixed
    {
        return $this->productRepository->find($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data): mixed
    {
        return $this->productRepository->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data): mixed
    {
        return $this->productRepository->update($id, $data);
    }

    /**
     * @param $id
     * @return true
     */
    public function delete($id): true
    {
        return $this->productRepository->delete($id);
    }
}
