<?php

namespace App\Http\Controllers;

use App\Logics\Numbers;
use Illuminate\Http\JsonResponse;

/**
 * Numbers controller
 */
class NumbersController extends Controller
{

    /**
     * Get list of numbers types
     *
     * @return JsonResponse
     */
    public function getTypes(): JsonResponse
    {
        $types = [];
        foreach (Numbers::TYPES as $key => $value) {
            $types[] = [
                'label' => $value,
                'value' => $key
            ];
        }
        return response()->json($types);
    }
}
