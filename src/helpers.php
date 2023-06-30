<?php

use Illuminate\Http\JsonResponse;
use Neography7\EasyResponse\EA;

/**
 * @param string $message
 * @param string|null $title
 * @param array|null $data
 * 
 * @return JsonResponse
 */
function easySuccess (string $message, string $title = null, array $data = null): JsonResponse 
{

    $ea = EA::success($message, $title);

    if (!empty($data))
        $ea = $ea->data($data);

    return $ea->response();

}

/**
 * @param string $message
 * @param string|null $title
 * @param int|null $code
 * @param array|null $data
 * 
 * @return JsonResponse
 */
function easyError (string $message, string $title = null, int $code = null, array $data = null): JsonResponse 
{

    $ea = EA::error($message, $title);
    
    if (!empty($code))
        $ea = $ea->code($code);

    if (!empty($data))
        $ea = $ea->data($data);

    return $ea->response();

}