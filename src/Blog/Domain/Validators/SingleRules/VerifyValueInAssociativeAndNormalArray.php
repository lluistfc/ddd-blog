<?php
namespace Blog\Domain\Validators\SingleRules;

/**
 * Class VerifyValueInAssociativeAndNormalArray
 * @package Blog\Domain\Validators
 */
trait VerifyValueInAssociativeAndNormalArray
{
    /**
     * @param $valuesToValidate
     * @param $associativeKey
     * @param $numericKey
     * @return bool|null
     */
    public function getValue($valuesToValidate, $associativeKey, $numericKey)
    {
        if (isset($valuesToValidate[$associativeKey])) {
            return $valuesToValidate[$associativeKey];
        }
        if (isset($valuesToValidate[$numericKey])) {
            return $valuesToValidate[$numericKey];
        }

        return null;
    }
}