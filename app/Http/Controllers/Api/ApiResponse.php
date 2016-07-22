<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Traits\Macroable;

class ApiResponse
{
    use Macroable;

    /**
     * additional data.
     *
     * @var array
     */
    protected static $additional;

    /**
     * Status text list.
     *
     * @var array
     */
    protected static $statusTexts = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing', // RFC2518
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status', // RFC4918
        208 => 'Already Reported', // RFC5842
        226 => 'IM Used', // RFC3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Reserved',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect', // RFC7238
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot', // RFC2324
        422 => 'Unprocessable Entity', // RFC4918
        423 => 'Locked', // RFC4918
        424 => 'Failed Dependency', // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal', // RFC2817
        426 => 'Upgrade Required', // RFC2817
        428 => 'Precondition Required', // RFC6585
        429 => 'Too Many Requests', // RFC6585
        431 => 'Request Header Fields Too Large', // RFC6585
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)', // RFC2295
        507 => 'Insufficient Storage', // RFC4918
        508 => 'Loop Detected', // RFC5842
        510 => 'Not Extended', // RFC2774
        511 => 'Network Authentication Required', // RFC6585
    ];

    /**
     * Create a new ApiResoonse instance.
     *
     * @param array $additional
     */
    public function __construct(array $additional)
    {
        static::$additional = $additional;
    }

    /**
     * Create standar response Json.
     *
     * @param string $message
     * @param mixed  $data
     * @param string $status  success|error
     * @param int    $code
     *
     * @return response json
     */
    protected static function responseJson($message, $data, $status, $code, array $headers = [])
    {
        $response = [
            'status' => $status,
            'data' => $data,
        ];

        if ($status == 'error') {
            $response['error'] = [
                'code' => $code,
                'message' => static::$statusTexts[$code],
            ];
        }

        $response['message'] = $message;

        if (is_array(static::$additional) and count(static::$additional) > 0) {
            $response = array_merge($response, static::$additional);
        }

        return response()->json($response, $code, $headers);
    }

    /**
     * response success.
     *
     * @param string $message
     * @param mixed  $data
     *
     * @return response json
     */
    public static function success($message = null, $data = null, $code = 200, array $headers = [])
    {
        return static::responseJson($message, $data, 'success', $code);
    }

    /**
     * response error.
     *
     * @param string $message
     * @param mixed  $data
     *
     * @return response json
     */
    public static function error($message = null, $data = null, $code = 500, array $headers = [])
    {
        return static::responseJson($message, $data, 'error', $code);
    }

    /**
     * force response error_log(message).
     *
     * @param string $message
     * @param mixed  $data
     *
     * @return response json
     */
    public static function abort($code)
    {
        return static::error(static::$statusTexts[$code], null, $code);
    }
}
