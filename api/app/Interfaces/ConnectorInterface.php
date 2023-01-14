<?php

namespace App\Interfaces;

/**
 * Interface connection to services
 */
interface ConnectorInterface {
    /**
     * Get Method: POST, GET, others
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Get link service
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Set data from service
     *
     * @param mixed $content
     */
    public function setData(mixed $content): void;
}
