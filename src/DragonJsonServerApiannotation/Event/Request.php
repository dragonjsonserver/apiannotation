<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerApiannotation
 */

namespace DragonJsonServerApiannotation\Event;

/**
 * Eventklasse für die Verwendung von API Annotationen beim Request
 */
class Request extends \Zend\EventManager\Event
{
	/**
	 * @var string
	 */
	protected $name = 'request';

    /**
     * Setzt den Request bei dem die API Annotation gefunden wurde
     * @param \DragonJsonServer\Request $request
     * @return Request
     */
    public function setRequest(\DragonJsonServer\Request $request)
    {
        $this->setParam('request', $request);
        return $this;
    }

    /**
     * Gibt den Request bei dem die API Annotation gefunden wurde zurück
     * @return \DragonJsonServer\Request
     */
    public function getRequest()
    {
        return $this->getParam('request');
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
