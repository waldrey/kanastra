<?php

namespace Core\Http\Controllers;

use Response;

class BaseController extends Controller
{

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    public function sendResponse($result, $message)
    {
        return Response::json($this->makeResponse($message, $result));
    }

    public function sendPaginationResponse($result, $message)
    {
        $data = $this->makeResponse($message, $result);
        unset($data['data']);
        $data = array_merge($data, $result);

        return Response::json($data);
    }

    public function sendError($error, $code = 404)
    {
        return Response::json($this->makeError($error), $code);
    }
}
