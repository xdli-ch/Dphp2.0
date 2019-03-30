<?php

namespace App;

/**
 * @author Wenming Tang <602505@qq.com>
 */
trait ResponseResult
{
    /**
     * @param array $data
     * @param int   $code
     */
    public function jsonSuccessReturn($data = [], $pagination = [], $code = ResponseCode::SUCCESS_OK)
    {
        if(empty($pagination)){
            return json_encode([
                'code'    => $code,
                'message' => 'Success',
                'data'    => $data,
            ]);
        }else{
            return json_encode([
                'code'    => $code,
                'message' => 'Success',
                'data'    => $data,
                'pagination' => $pagination
            ]);
        }

    }

    /**
     * @param string $message
     * @param int    $code
     *
     */
    public function jsonFailReturn($message = '操作失败', $code = ResponseCode::ERROR_UNKNOWN)
    {
        return json_encode([
            'code' => $code,
            'message' => $message,
            'data' => []
        ]);
    }

}