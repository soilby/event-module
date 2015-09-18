<?php
namespace Soil\Event\Additional;

/**
 * Created by PhpStorm.
 * User: fliak
 * Date: 12.9.15
 * Time: 9.29
 */

trait EventLoggerAwareTrait {


    /**
     * @var \Soilby\EventComponent\Service\EventLogger
     */
    protected $eventLogger;

    protected $ontologyAbbr = 'tal';

    /**
     * @param \Soilby\EventComponent\Service\EventLogger $eventLogger
     */
    public function setEventLogger($eventLogger)
    {
        $this->eventLogger = $eventLogger;
    }

    public function getEventLogger()    {
        if (!$this->eventLogger)    {
            $this->eventLogger = $this->getServiceLocator()->get('Soil\EventComponent\Service\EventLogger');
        }

        return $this->eventLogger;
    }





    protected function iriFormat($rightPart)    {
        return $this->getOntologyAbbr() . ':' . $rightPart;
    }

    /**
     * @return mixed
     */
    public function getOntologyAbbr()
    {
        return $this->ontologyAbbr;
    }

    /**
     * @param mixed $ontologyAbbr
     */
    public function setOntologyAbbr($ontologyAbbr)
    {
        $this->ontologyAbbr = $ontologyAbbr;
    }

} 