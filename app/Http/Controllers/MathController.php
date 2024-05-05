<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponseApiHelper;
use App\Services\MathService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

/**
 *
 */
class MathController extends Controller
{
    /**
     * @var MathService
     */
    protected MathService $mathService;

    /**
     * @param MathService $mathService
     */
    public function __construct(MathService $mathService)
    {
        $this->mathService = $mathService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findThreeConsecutiveSum(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'numbersArray' => 'array|required|min:3',
            'numbersArray.*' => 'numeric|required',
            'targetSum' => 'numeric|required',
        ]);
        if ($validator->fails()) {
            return ResponseApiHelper::errorField('Verifique os campos', $validator->errors());
        }

        try {
            $numbersArray = $request->input('numbersArray', []);
            $targetSum = $request->input('targetSum');
            $combinations = $this->mathService->findTripleArray($numbersArray, $targetSum);
            return ResponseApiHelper::success($combinations);
        } catch (Exception $e) {
            return ResponseApiHelper::error($e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findSingleNumberInArray(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'numbersArray' => 'array|required',
            'numbersArray.*' => 'numeric|required',
        ]);
        if ($validator->fails()) {
            return ResponseApiHelper::errorField('Verifique os campos', $validator->errors());
        }

        try {
            $numbersArray = $request->input('numbersArray', []);
            $singleNumbers = $this->mathService->findSingleNumbers($numbersArray);
            return ResponseApiHelper::success([
                'input' => $numbersArray,
                'single' => $singleNumbers,
            ]);
        } catch (Exception $e) {
            return ResponseApiHelper::error($e->getMessage());
        }
    }
}
