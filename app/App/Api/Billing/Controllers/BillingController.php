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

            $response = $action(FormatBillingData::formatBankHook($receiveHook));
            if (!$response) {
                return $this->sendError('Billing not found', 404);
            }

            return $this->sendResponse($receiveHook, 'Billing updated with success!');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function batch(BillingRequest $request, CreateBillingAction $action)
    {
        try {
            $billings = $request->all();

            $parserManager = new Parsers('csv');
            $billingsRows = $parserManager->parser->handle($billings['files']);

            $billingsData = FormatBillingData::formatTypes($billingsRows);     
            $response = $action($billingsData);
            if (!$response) {
                return $this->sendError('Unable to add billings', 500);
            }

            return $this->sendResponse(FormatBillingData::formatResponse($billingsData), 'Billing registred with success!');
        } catch (Exception $e) {
            dd($e);
        }
    }
}