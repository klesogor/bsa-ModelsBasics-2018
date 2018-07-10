<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 10.07.2018
 * Time: 16:12
 */

namespace App\Requests;


trait ThrowsLogicException
{
    private function makeException(string $fieldName,string $message): \LogicException
    {
        return new \LogicException("{$fieldName} should be {$message}");
    }
}