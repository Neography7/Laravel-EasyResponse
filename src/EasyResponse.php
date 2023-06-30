<?php

namespace Neography7\EasyResponse;

use Illuminate\Http\JsonResponse;

class EasyResponse 
{
    
    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $message;

    /**
     * @var array
     */
    private array $data;

    /**
     * @var bool
     */
    private bool $success;

    /**
     * @var int
     */
    private int $code;

    /**
     * @var array
     */
    public array $response;

    /**
     * @param string $message
     * 
     * @return Self
     */
    public function message (string $message): Self 
    {

        $this->message = $message;
        return $this;

    }

    /**
     * @param string $title
     * 
     * @return Self
     */
    public function title (string $title): Self 
    {

        $this->title = $title;
        return $this;

    }

    /**
     * @param int $code
     * 
     * @return Self
     */
    public function code (int $code): Self 
    {

        $this->code = $code;
        return $this;

    }

    /**
     * @param bool $success
     * 
     * @return Self
     */
    public function success (bool $success): Self 
    {

        $this->success = $success;
        return $this;

    }

    /**
     * @param array|object $data
     * 
     * @return Self
     */
    public function data (array|object $data): Self 
    {

        $this->data = $data;
        return $this;

    }

    /**
     * @param string $key
     * @param mixed $value
     * 
     * @return Self
     */
    public function addKey (string $key, $value): Self 
    {

        $this->response[$key] = $value;
        return $this;

    }

    /**
     * @param string $key
     * 
     * @return Self
     */
    public function removeKey (string $key): Self 
    {

        unset($this->response[$key]);
        return $this;

    }

    /**
     * @return Array
     */
    public function toArray (): Array 
    {

        if (isset($this->title))
            $this->response["title"] = $this->title;

        if (isset($this->message))
            $this->response["message"] = $this->message;

        if (isset($this->success))
            $this->response["success"] = $this->success;

        if (isset($this->code))
            $this->response["code"] = $this->code;

        if (!empty($this->data))
            $this->response["data"] = $this->data;

        return $this->response;

    }

    /**
     * @return [type]
     */
    public function response (): JsonResponse 
    {

        return response()->json($this->toArray(), ($this->code ?? 200));

    }

}
