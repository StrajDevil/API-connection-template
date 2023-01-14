<?php

namespace App\Services\Jservice;

use App\Factories\RequestFactory;
use App\Interfaces\ConnectorInterface;

/**
 * Jservice service request
 */
class JserviceRequest extends RequestFactory {

    /**
     * Get connector jservice service
     *
     * @return ConnectorInterface
     */
    public function getConnector(): ConnectorInterface {
		return new JserviceConnector();
	}
}
