<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class CreateBillingTest extends TestCase
{

    public function test_create_billing_without_csv_returns_csv_not_found(): void
    {
        $response = $this->post('/api/v1/billings/batch');

        $response->assertStatus(400);
        $response->assertBadRequest();
        $response->assertJson([
            'success' => false,
            'message' => 'CSV not found'
        ], $strict = false);
    }

    public function test_create_billing_returns_billing_created(): void
    {
        $file = __DIR__ . '/billings-kanastra.csv';
        $file = new UploadedFile($file, 'billings-kanastra.csv', 'text/csv', null, true);

        $response = $this->post('/api/v1/billings/batch', [
            'file' => $file
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');
        $response->assertJson([
            'success' => true,
            'data' => [
                [
                    'name' => 'John Doe',
                    'debtAmount' => 1000000,
                    'debtId' => 8291,
                ]
            ],
            'message' => 'Billing registred with success!'
        ], $strict = false);
    }

    public function test_create_billings_returns_multi_billings_created(): void
    {
        $file = __DIR__ . '/billings-multi-kanastra.csv';
        $file = new UploadedFile($file, 'billings-multi-kanastra.csv', 'text/csv', null, true);

        $response = $this->post('/api/v1/billings/batch', [
            'file' => $file
        ]);

        
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
        $response->assertJson([
            'success' => true,
            'message' => 'Billing registred with success!'
        ], $strict = false);
    }
}
