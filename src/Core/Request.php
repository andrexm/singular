<?php

namespace Src\Core;

class Request
{
    private $reqData;
    private static $instance;

    private function __construct()
    {}

    /**
     * Returns a Request instance
     *
     * @return Request
     */
    public static function getInstance(): Request
    {
        if (!self::$instance) {
            self::$instance = new Request;
        }
        return self::$instance;
    }

    /**
     * Returns a value or all of them passed via the request
     *
     * @param string|null $name
     * @return mixed
     */
    public function input(string $name = null): mixed
    {
        if (!$this->reqData) $this->loadReqData();
        if ($this->reqData) return $this->reqData->$name;
        return $this->reqData;
    }

    /**
     * Returns the client IP address
     *
     * @return string
     */
    public function ip(): string
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * @return string
     */
    public function method(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**
     * @return void
     */
    private function loadReqData()
    {
        switch ($this->method()) {
            case 'GET':
                $this->reqData = (object)$_GET;
                break;

            case 'POST':
                $this->reqData = (object)$_POST;
                break;

            case 'PUT':
                parse_str(file_get_contents("php://input"), $putData);
                $this->reqData = (object)$putData;
                break;

            default:
                $this->reqData = false;
                break;
        }
    }

    /**
     * @return array
     */
    public function getReqData(): array
    {
        $this->loadReqData();
        return (array)$this->reqData;
    }
}
