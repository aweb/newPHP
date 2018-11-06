<?php
/**
 *
 * Created At 2018/11/5 11:24 PM.
 * User: kaiyanh <nzing@aweb.cc>
 */
class CoroutineReturnValue {
    protected $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}