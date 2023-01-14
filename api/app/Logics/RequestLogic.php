<?php

namespace App\Logics;

use App\Factories\RequestFactory;
use App\Services\Jservice\JserviceRequest;
use App\Services\Numbers\NumbersRequest;

/**
 * Selecting request service interface
 */
class RequestLogic {

    /**
     * Get poster interface
     *
     * @param string $apiCode
     *
     * @return RequestFactory|null
     */
    public static function get(string $apiCode): ?RequestFactory
    {
        return match ($apiCode) {
            'numbers' => new NumbersRequest(),
            'jservice' => new JserviceRequest(),
            default => null,
        };
    }
}
