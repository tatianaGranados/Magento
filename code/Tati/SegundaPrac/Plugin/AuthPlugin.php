<?php


namespace Tati\SegundaPrac\Plugin;


class AuthPlugin
{
    public function afterLogin(\Magento\Backend\Model\Auth $subject, $result, $username, $password){
        echo "su nombre usuario es: {$username}";
        echo "su nombre usuario es: {$password}";
        die;
    }

}
