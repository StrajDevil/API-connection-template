<?php

namespace App\Services\Jservice;

use App\Interfaces\ConnectorInterface;

/**
 * Data connection to jservice service
 */
class JserviceConnector implements ConnectorInterface
{
    /**
     * Protocol from jservice service
     */
    private const PROTOCOL = 'http';

    /**
     * Base url from jservice service
     */
    private const BASE_URL = 'jservice.io/api/random';

    /**
     * Parameter count from jservice service
     *
     * @var int
     */
    private int $count = 1;

    /**
     * @inheritDoc
     */
    public function getMethod(): string {
        return 'GET';
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): string {
        return self::PROTOCOL . '://' . self::BASE_URL . '?count=' . $this->count;
    }

    /**
     * @inheritDoc
     */
    public function setData($content): void
    {
        if (!empty($content)) {
            $this->count = $content;
        }
    }
}
