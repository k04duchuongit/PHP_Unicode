<?php
class AuthIntergface_class implements InterfaceAuth
{
    const _MSG_TEMPLATE = [

    ];
    public function login()
    {
        return 'this is login';
    }
    public function register() {}
    public function resetPass() {}
    public function forgotPass() {}
}
