<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2014 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerApiannotation
 */

namespace DragonJsonServerApiannotation\Event;

/**
 * Eventklasse für die Verwendung von API Annotationen bei der Servicemap
 */
class Servicemap extends \Zend\EventManager\Event
{
	/**
	 * @var string
	 */
	protected $name = 'Servicemap';

    /**
     * Setzt den Service bei dem die API Annotation gefunden wurde
     * @param \Zend\Json\Server\Smd\Service $service
     * @return Servicemap
     */
    public function setService(\Zend\Json\Server\Smd\Service $service)
    {
        $this->setParam('service', $service);
        return $this;
    }

    /**
     * Gibt den Service bei dem die API Annotation gefunden wurde zurück
     * @return \Zend\Json\Server\Smd\Service
     */
    public function getService()
    {
        return $this->getParam('service');
    }

    /**
     * Setzt die Annotation die gefunden wurde
     * @param \Doctrine\Common\Annotations\Annotation $annotation
     * @return Request
     */
    public function setAnnotation(\Doctrine\Common\Annotations\Annotation $annotation)
    {
        $this->setParam('annotation', $annotation);
        return $this;
    }

    /**
     * Gibt die Annotation die gefunden wurde zurück
     * @return \Doctrine\Common\Annotations\Annotation
     */
    public function getAnnotation()
    {
        return $this->getParam('annotation');
    }
}
