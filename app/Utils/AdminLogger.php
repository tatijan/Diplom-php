<?php
namespace App\Utils;

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AdminLogger {

    private static $instance = null;

    private function __construct() {
    }

    /**
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
     * @param String                                          $message
     */
    public static function record($user, $message) {
        if ($user !== null) {
            self::getInstance()->info($user->name . " " . $message);
        }
    }

    /**
     * @return Logger
     */
    private static function getInstance() {
        if (self::$instance === null) {
            self::$instance = self::init();
        }
        return self::$instance;
    }

    /**
     * @return Logger
     */
    private static function init() {
        $orderLog = new Logger('order');
        $handler = new StreamHandler(storage_path('logs/admin.log'), Logger::INFO);
        $formatter = new LineFormatter(null, null, false, true);
        $handler->setFormatter($formatter);
        $orderLog->pushHandler($handler);
        return $orderLog;
    }
}
