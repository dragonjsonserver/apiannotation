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
