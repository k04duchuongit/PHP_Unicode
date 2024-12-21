<?php
interface InterfaceAuth
{
    const _MSG_TEMPLATE = [];
    public function login();
    public function register();
    public function resetPass();
    public function forgotPass();
}
