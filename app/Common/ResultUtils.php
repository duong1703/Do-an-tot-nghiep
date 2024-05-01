<?php 

namespace App\Common;

class ResultUtils
{
    const STATUS_CODE_OK = 'OK';
    const STATUS_CODE_ERR = 'ERR';
    const MESSAGE_CODE_OK = 'successMsg';
    const MESSAGE_CODE_ERR = 'errorMsg';
}

function cart(bool $getShared = true)
{
    return \Config\Services::cart($getShared);
}