<?php

namespace Api\Billing\Controllers;

use Illuminate\Http\Request;

use Core\Http\Controllers\BaseController;
use Core\Events\BillingCreated;
use Api\Billing\Requests\BillingRequest;
use Domain\Billing\Actions\CreateBillingAction;
use Domain\Billing\Actions\BankResponseBillingAction;
use Utils\Parsers\Parsers;
use Utils\Formats\FormatBillingData;

class BillingController extends BaseController
{
    public function webhook(Request $request, BankResponseBillingAction $action)
    {
        try {
            $receiveHook = $request->all();

            if (empty($receiveHook)) {
                return $this->sendError('Payload empty', 400);
            }

            $response = $action(FormatBillingData::formatBankHook($receiveHook));
            if (!$response) {
                return $this->sendError('Billing not found', 404);
            }

            return $this->sendResponse($receiveHook, 'Billing updated with success!');

        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 500);
        }
    }

    public function batch(BillingRequest $request, CreateBillingAction $action)
    {
        try {
            $billings = $request->file;

            if (!isset($billings)) {
                return $this->sendError('CSV not found', 400);
            }

            $parserManager = new Parsers('csv');
            $billingsRows = $parserManager->parser->handle($billings);

            $billingsData = FormatBillingData::formatTypes($billingsRows);     
            $response = $action($billingsData);
            if (!$response) {
                return $this->sendError('Unable to add billings', 500);
            }

            foreach ($billingsData as $billing) {
                event(new BillingCreated($billing));
            }

            return $this->sendResponse(FormatBillingData::formatResponse($billingsData), 'Billing registred with success!');
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), 500);
        }
    }
}