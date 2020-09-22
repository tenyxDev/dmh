<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const RESPONSE_SUCCESS = 'success';
    const RESPONSE_ERROR   = 'error';

    protected $perPage;

    /**
     * Returns success
     *
     * @param array|null $data Data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success(array $data = null)
    {
        $response = [];

        if (!empty($data)) {
            $response = $data;
        }

        $response['type'] = self::RESPONSE_SUCCESS;

        return response()->json($response);
    }

    /**
     * Returns error
     *
     * @param array|null $data Data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(array $data = null)
    {
        $response = [];

        if (!empty($data)) {
            $response = $data;
        }

        $response['type'] = self::RESPONSE_ERROR;

        return response()->json($response);
    }

    /**
     * Redirect with history
     *
     * @param string $url Url
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirect(string $url)
    {
        return redirect()->to(request('_r', $url));
    }
}
