<?php

namespace App;

/**
 * 响应代码定义
 *
 * 成功 0
 * 成功 正数
 * 失败 负数
 *
 * 未知错误 -100
 * 用户类 -200
 * 表单验证类 -300
 * 用户无权限 -400
 *
 * 同一类错误采用同一开头的数字，比如 -200 -201 -202
 * 可根据需要进行添加
 *
 * @author Wenming Tang <602505@qq.com>
 */
final class ResponseCode
{
    /**
     * 成功
     */
    public const SUCCESS_OK = 0;

    /**
     * 默认的错误状态码
     */
    public const ERROR_UNKNOWN = -100;

    /**
     * 用户未登录状态码
     */
    public const ERROR_NOT_LOGIN = -200;

    /**
     * 表单验证失败
     */
    public const ERROR_VALIDATION_FAIL = -300;

    /**
     * 用户无权限
     */
    public const ERROR_FORBIDDEN = -400;

}