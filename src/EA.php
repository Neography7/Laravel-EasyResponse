<?php

namespace Neography7\EasyResponse;

class EA {

    /**
     * @var EasyResponse
     */
    public static $instance;

    /**
     * @return void
     */
    public static function init(): void 
    {

        Self::$instance = new EasyResponse;

    }

    /**
     * @param mixed $message
     * @param null $title
     * 
     * @return [type]
     */
    public static function success ($message, $title = null)
    {
        
        Self::init();

        $easyResponse = Self::$instance;

        if (!empty($title))
            $easyResponse->title($title);

        $easyResponse->message($message);
        $easyResponse->success(true);

        return $easyResponse;

    }

    /**
     * @param mixed $message
     * @param null $title
     * @param null $code
     * 
     * @return [type]
     */
    public static function error ($message, $title = null, $code = null)
    {
        
        Self::init();

        $easyResponse = Self::$instance;

        $easyResponse->success(false);
        $easyResponse->message($message);

        if (!empty($title))
            $easyResponse->title($title);

        if (!empty($code))
            $easyResponse->code($code);

        return $easyResponse;

    }

}