<?php

namespace Neography7\EasyResponse\Tests;

final class ErrorDataProvider
{
    public static function errorData(): array
    {
        return [
            [
                [
                    "title" => "Test Title",
                    "message" => "Test",
                    "success" => false,
                    "code" => 400,
                    "data" => [
                        "data1" => 1,
                        "data2" => "test",
                        "data3" => ["test"],
                    ]
                ]
            ]
        ];
    }
}