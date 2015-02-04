<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 26.1.15
 * Time: 11.42
 */

namespace Soil\Event\Factory;


use Soilby\EventComponent\Service\EventLogger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EventLoggerFactory implements FactoryInterface {


    public function createService(ServiceLocatorInterface $serviceLocator)  {
        $configuration = $serviceLocator->get('Configuration');
        $config = $configuration['soil_events_config'];


        $eventLogger = new EventLogger($config['ontology_config'], $config['carrier_config']);

        $urinatorService = array_key_exists('urinator_service', $config) ? $config['urinator_service'] : 'URInator';

        $urinator = $serviceLocator->get($urinatorService);
        $eventLogger->setUrinator($urinator);


        $urinator = $serviceLocator->get('Soil\EventComponent\Service\GearmanClient');
        $eventLogger->setLogCarrier($urinator);

        $module = $serviceLocator->get('Soil\Event\Module');
        $module->setEventLoggerInstance($eventLogger);

        return $eventLogger;
    }

} 