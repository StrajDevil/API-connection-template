<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceCollection;
use App\Logics\RequestLogic;
use App\Models\Service;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Service Controller
 */
class ServiceController extends Controller
{
    /**
     * Get list of services
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(new ServiceCollection(Service::all()));
    }

    /**
     * Send request to service
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function send(Request $request): JsonResponse
    {
        $validate = Validator::make($request->all(), [
            'service' => [
                'required',
                Rule::exists('services', 'code')
            ]
        ]);
        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validate->errors()
            ]);
        }
        $code = $request->post('service');
        $content = $request->post('data');

        $requestLogic = RequestLogic::get($code);
        $result = $requestLogic->send($content);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }
}
