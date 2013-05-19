<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerApiannotation
 */

namespace DragonJsonServerApiannotation;

/**
 * Klasse zur Initialisierung des Moduls
 */
class Module
{
    use \DragonJsonServer\ServiceManagerTrait;
    use \DragonJsonServer\EventManagerTrait;
	
    /**
     * Gibt die Konfiguration des Moduls zurück
     * @return array
     */
    public function getConfig()
    {
        return require __DIR__ . '/config/module.config.php';
    }

    /**
     * Gibt die Autoloaderkonfiguration des Moduls zurück
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }
    
    /**
     * Wird bei der Initialisierung des Moduls aufgerufen
     * @param \Zend\ModuleManager\ModuleManager $moduleManager
     */
    public function init(\Zend\ModuleManager\ModuleManager $moduleManager)
    {
    	$sharedManager = $moduleManager->getEventManager()->getSharedManager();
    	$sharedManager->attach('DragonJsonServer\Service\Server', 'Request', 
	    	function (\DragonJsonServer\Event\Request $eventRequest) {
	    		$request = $eventRequest->getRequest();
	    		$serviceServer = $this->getServiceManager()->get('\DragonJsonServer\Service\Server');
	    		list ($classname, $methodname) = $serviceServer->parseMethod($request->getMethod());
	    		$annotations = (new \Doctrine\Common\Annotations\AnnotationReader())
	    			->getMethodAnnotations(new \ReflectionMethod($classname, $methodname));
	    		foreach ($annotations as $annotation) {
	    			$this->getEventManager()->trigger(
    					(new \DragonJsonServerApiannotation\Event\Request())
	    					->setTarget($this)
	    					->setRequest($request)
	    					->setAnnotation($annotation)
	    			);
	    		}
	    	}
    	);
    	$sharedManager->attach('DragonJsonServer\Service\Server', 'Servicemap', 
    		function (\DragonJsonServer\Event\Servicemap $eventServicemap) {
	    		$serviceServer = $this->getServiceManager()->get('\DragonJsonServer\Service\Server');
		        foreach ($eventServicemap->getServicemap()->getServices() as $method => $service) {
	    			list ($classname, $methodname) = $serviceServer->parseMethod($method);
			        $annotations = (new \Doctrine\Common\Annotations\AnnotationReader())
		    			->getMethodAnnotations(new \ReflectionMethod($classname, $methodname));
		    		foreach ($annotations as $annotation) {
		    			$this->getEventManager()->trigger(
	    					(new \DragonJsonServerApiannotation\Event\Servicemap())
		    					->setTarget($this)
			            		->setService($service)
		    					->setAnnotation($annotation)
		    			);
	    			}
		        }
    		}
    	);
    }
}
