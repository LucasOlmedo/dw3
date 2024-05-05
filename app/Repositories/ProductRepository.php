<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class ProductRepository
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Product::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): mixed
    {
        return Product::findOrFail($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data): mixed
    {
        return Product::create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data): mixed
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    /**
     * @param $id
     * @return true
     */
    public function delete($id): true
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return true;
    }
}
