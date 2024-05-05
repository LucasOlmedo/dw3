<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Responses\ResponseApiHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Exception;

/**
 *
 */
class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->getAll();
        return ResponseApiHelper::success($products);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $product = $this->productService->find($id);
            return ResponseApiHelper::success($product);
        } catch (Exception $e) {
            return ResponseApiHelper::notFound('Produto não encontrado');
        }
    }

    /**
     * @param StoreProductRequest $request
     * @return JsonResponse
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $validatedRequest = $request->validated();
        $newProduct = $this->productService->create($validatedRequest);
        return ResponseApiHelper::created($newProduct);
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $updatedProduct = $this->productService->update($id, $request->all());
            return ResponseApiHelper::success($updatedProduct);
        } catch (Exception $e) {
            return ResponseApiHelper::notFound('Produto não encontrado');
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $this->productService->delete($id);
            return ResponseApiHelper::success(['message' => 'Produto excluído']);
        } catch (Exception $e) {
            return ResponseApiHelper::notFound('Produto não encontrado');
        }
    }
}
