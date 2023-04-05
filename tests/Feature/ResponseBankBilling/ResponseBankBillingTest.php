<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class ResponseBankBillingTest extends TestCase
{

    public function test_response_bank_billing_with_debtid_exists_in_database(): void
    {
        $dataBank = [
            'debtId' => '8291',
            'paidAt' => "2023-04-05 10:00:00",
            'paidAmount' => 100000.00,
            'paidBy' => 'John Doe'
        ];

        $response = $this->post('/api/v1/billings/webhook', $dataBank);

        $response->assertStatus(200);
    }

    public function test_response_bank_billing_with_debtid_inexistent_in_database(): void
    {
        $dataBank = [
            'debtId' => '48329742209',
            'paidAt' => "2023-04-05 10:00:00",
            'paidAmount' => 100000.00,
            'paidBy' => 'John Doe'
        ];

        $response = $this->post('/api/v1/billings/webhook', $dataBank);

        $response->assertStatus(404);
        $response->assertNotFound();
        $response->assertJson([
            'success' => false,
            'message' => 'Billing not found'
        ], $strict = false);
    }
}
