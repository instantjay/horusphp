<?php

namespace instantjay\horusphp;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Validator {
    public static function isValidEmailAddress($emailAddress) {
        $validator = new EmailValidator();
        return $validator->isValid($emailAddress, new RFCValidation());
    }
}