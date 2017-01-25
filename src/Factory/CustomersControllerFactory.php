<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * CustomersControllerFactory
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers\Factory;

use Interop\Container\ContainerInterface;
use FgCustomers\Controller\CustomersController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\ClassMethods;
use FgCustomers\Model\Customers;

/**
 * CustomersControllerFactory Class
 *
 * @category Factory
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class CustomersControllerFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null)
    {
        return new CustomersController(
			$container,
			new ClassMethods(false),
			new Customers()
		);
    }
	
	/**
	* Create service
	*
	* @param ServiceLocatorInterface $serviceLocator
	*
	* @return mixed
	*/
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		return $this($serviceLocator, 'FgCustomers\Factory\CustomersControllerFactory');
     }
}