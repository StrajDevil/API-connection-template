<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A feature test Service validation service.
     *
     * @return void
     */
    public function testValidationErrors()
    {
        $this->setSanctum();
        $response = $this->post('/api/send');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'success',
            'errors'
        ]);
        $response->assertJson(['errors' => true]);
    }

    /**
     * A feature test Service required.
     *
     * @return void
     */
    public function testValidationErrorsMessageRequired()
    {
        $this->setSanctum();
        $response = $this->post('/api/send');

        $response->assertStatus(200);
        $response->assertSee('The service field is required.');
    }

    /**
     * A feature test Service invalid.
     *
     * @return void
     */
    public function testValidationErrorsMessageServiceInvalid()
    {
        $this->setSanctum();
        $response = $this->post('/api/send', ['service' => 'test']);

        $response->assertStatus(200);
        $response->assertSee('The selected service is invalid.');
    }
}
