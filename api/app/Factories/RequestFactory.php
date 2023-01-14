<?php

namespace App\Factories;

use App\Interfaces\ConnectorInterface;
use Exception;
use Illuminate\Support\Facades\Http;

/**
 * Create connection to services
 */
abstract class RequestFactory {
    /**
     * Get connector from service interface
     *
     * @return ConnectorInterface
     */
    abstract public function getConnector(): ConnectorInterface;

    /**
     * Request to service
     *
     * @param $content mixed data for service
     *
     * @throws Exception
     */
    public function send(mixed $content): string
    {
        $poster = $this->getConnector();
        $poster->setData($content);
        $request = Http::baseUrl($poster->getUrl());
        $response = $request->send(
            $poster->getMethod(),
            $poster->getUrl()
        );
        return $response->body();
    }
}
