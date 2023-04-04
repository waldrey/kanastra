<?php

namespace App\Api\Billing\Controllers;

use Illuminate\Http\Request;
use App\Core\Http\Controllers\BaseController;

use App\Api\Billing\Requests\BillingRequest;
use Domain\Billing\Actions\CreateBillingAction;
use Utils\Parsers\Parsers;
use Utils\Formats\FormatBillingData;

class BillingController extends BaseController
{
    public function webhook(Request $request)
    {
        //@TODO: Create webhook
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