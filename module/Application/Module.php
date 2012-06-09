<?php

namespace Application;

use Zend\Db\Adapter\Adapter as DbAdapter;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfiguration() {
        return array(
            'factories' => array(
                'db-adapter' => function($sm) {
                    $config = $sm->get('config');
                    $config = $config['db'];
                    $dbAdapter = new DbAdapter($config);
                    return $dbAdapter;
                },
            ),
        );
    }

}
