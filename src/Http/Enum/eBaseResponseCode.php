<?php

namespace DevcorpIt\ResponseCode\Http\Enum;

abstract class eBaseResponseCode {

    static function getAll($class) {
        $Class = new \ReflectionClass($class);
        return $Class->getConstants();
    }

    // Common
    const _403_NOT_AUTHORIZED = ['403_00' => 'Not Authorized'];
    const _400_BAD_REQUEST = ['400_00' => 'Bad Request'];
    const _500_INTERNAL_ERROR = ['500_00' => 'Internal Error'];
    const _520_UNKNOWN_ERROR = ['520_00' => 'Unknown Error'];
    const _200_OK = ['200_00' => 'OK'];
    const _404_NOT_FOUND = ['404_00' => 'Not Found'];
}
