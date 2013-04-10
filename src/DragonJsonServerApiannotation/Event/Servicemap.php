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
 * Eventklasse für die Verwendung von API Annotationen bei der Servicemap
 */
class Servicemap extends \Zend\EventManager\Event
{
	/**
	 * @var string
	 */
	protected $name = 'servicemap';

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
     * Setzt den Tag der gefunden wurde
     * @param \Zend\Code\Reflection\DocBlock\Tag\TagInterface $tag
     * @return Request
     */
    public function setTag(\Zend\Code\Reflection\DocBlock\Tag\TagInterface $tag)
    {
        $this->setParam('tag', $tag);
        return $this;
    }

    /**
     * Gibt den Tag der gefunden wurde zurück
     * @return \Zend\Code\Reflection\DocBlock\Tag\TagInterface
     */
    public function getTag()
    {
        return $this->getParam('tag');
    }
}
