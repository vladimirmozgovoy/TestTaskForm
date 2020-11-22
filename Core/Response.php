<?php


namespace Core;

abstract class Response
{
    /** Вывод Ответа
     * @param int $code
     * @param string $message
     * @param array $data
     * @return false|string
     */
    public static function setResponse(int $code,string $message = "",array $data = [])
    {
        switch ($code) {
            case 200 :
                $response['status'] = "Success";
                break;
            case 300 :
                $response['error'] = "Error";
                break;
            case 500 :
                http_response_code(500);
                $response['error'] = "Error";
                $response['message'] = $message;
                $response['data'] = $data;
                echo json_encode($response);
                die();
            case 404 :
                http_response_code(404);
                $response['code'] = 404;
                $response['error'] = "Error";
                $response['message'] = "Error route not found";
                echo json_encode($response);
                die();
        }
        $response['message'] = $message;
        $response['data'] = $data;

        return json_encode($response,JSON_UNESCAPED_UNICODE);
    }
}