<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Soil\EventComponent\Service\EventLogger' => 'Soil\Event\Factory\EventLoggerFactory',
            'Soil\EventComponent\Service\GearmanClient' => 'Soil\Event\Factory\GearmanClientFactory',
            'Soil\EventComponent\Service\HttpGearmanClient' => 'Soil\Event\Factory\HttpGearmanClientFactory',
        )
    )
);