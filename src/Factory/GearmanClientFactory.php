<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 26.1.15
 * Time: 21.28
 */

namespace Soil\Event\Factory;

use Soilby\EventComponent\Service\GearmanClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GearmanClientFactory implements FactoryInterface {


    public function createService(ServiceLocatorInterface $serviceLocator)  {
        $configuration = $serviceLocator->get('Configuration');
        $config = $configuration['soil_events_config']['gearman'];

        $client = new GearmanClient($config['serverIP'], $config['serverPort']);

        return $client;
    }

} 