<?php

namespace App\Services\Numbers;

use App\Factories\RequestFactory;
use App\Interfaces\ConnectorInterface;

/**
 * Numbers service request
 */
class NumbersRequest extends RequestFactory {

    /**
     * Get connector numbers service
     *
     * @return ConnectorInterface
     */
    public function getConnector(): ConnectorInterface {
		return new NumbersConnector();
	}
}
