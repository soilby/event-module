<?php
/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 26.1.15
 * Time: 21.28
 */

namespace Soil\Event\Factory;

use EasyRdf\Http\Client;
use Soilby\EventComponent\Service\GearmanClient;
use Soilby\EventComponent\Service\HttpGearmanClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class HttpGearmanClientFactory implements FactoryInterface {


    public function createService(ServiceLocatorInterface $serviceLocator)  {
        $configuration = $serviceLocator->get('Configuration');
        $config = $configuration['soil_events_config']['gearman'];

        $httpClient = new Client();

        $client = new HttpGearmanClient($config['endpoint_url'], $httpClient);

        return $client;
    }

} 