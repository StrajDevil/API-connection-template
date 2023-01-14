<?php

namespace App\Services\Numbers;

use App\Interfaces\ConnectorInterface;

/**
 * Data connection to numbers service
 */
class NumbersConnector implements ConnectorInterface
{
    /**
     * Protocol from numbers service
     */
    private const PROTOCOL = 'http';

    /**
     * Base url from numbers service
     */
    private const BASE_URL = 'numbersapi.com';

    /**
     * Parameter number from numbers service
     *
     * @var string
     */
    private string $number = 'random';

    /**
     * Parameter type from numbers service
     *
     * @var string
     */
    private string $type;

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
        return self::PROTOCOL . '://' . self::BASE_URL . '/' . $this->number . '/' . $this->type;
    }

    /**
     * @inheritDoc
     */
    public function setData($content): void
    {
        if (!empty($content['firstNumber'])) {
            $this->number = isset($content['secondNumber']) ?
                $content['secondNumber'] . '/' . $content['firstNumber'] :
                $content['firstNumber'];
        }
        $this->type = $content['type'];
    }
}
