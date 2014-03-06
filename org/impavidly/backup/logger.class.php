<?php
namespace Org\Impavidly\Backup;

class Logger extends \Logger {
    public static function getLogger($name) {
        parent::configure(array(
            'rootLogger' => array(
                'appenders' => array('default'),
            ),
            'appenders' => array(
                'default' => array(
                    'class' => 'LoggerAppenderFile',
                    'layout' => array(
                        'class' => 'LoggerLayoutPattern',
                        'params' => array(
                            'conversionPattern' => '%d{ISO8601} [%p]: %m %n',
                        ),
                    ),
                    'params' => array(
                        'file' => 'my.log',
                        'append' => true
                    )
                )
            )
        ));

        return parent::getLogger($name);
    }
}