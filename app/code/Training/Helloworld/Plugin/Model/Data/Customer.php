<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 10/04/17
 * Time: 17:21
 */

namespace Training\Helloworld\Plugin\Model\Data;


/**
 * Class Customer
 * @package Training\Helloworld\Plugin\Model\Data
 */
class Customer
{


    /**
     * @param \Magento\Customer\Model\Data\Customer $subject
     * @param $value
     * @return array
     */
    public function beforeSetFirstname(\Magento\Customer\Model\Data\Customer $subject, $value) {

        $value = mb_convert_case($value, MB_CASE_TITLE);

        return [$value];
    }
}