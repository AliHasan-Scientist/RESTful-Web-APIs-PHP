<?php
class ErrorHandler
{
    public static function handleException(Throwable $exceptions): void
    {
        http_response_code(500);
        json_encode(array(
            'code' => $exceptions->getCode(),
            'message' => $exceptions->getMessage(),
            'file' => $exceptions->getFile(),
            'line' => $exceptions->getLine()

        ));
    }
}
