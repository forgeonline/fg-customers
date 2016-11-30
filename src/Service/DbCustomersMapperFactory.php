<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * Service
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\ClassMethods;
use FgCustomers\Mapper\CustomersMapper;
use FgCustomers\Model\Customers;

/**
 * DbCustomersMapperFactory Class
 *
 * @category Service
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class DbCustomersMapperFactory implements FactoryInterface
{
    /**
     * Factory for zend-servicemanager v3.
     *
     * @param ContainerInterface $container
     * @param string $name
     * @param null|array $options
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
	) {
		return new CustomersMapper(
			$container->get('Zend\Db\Adapter\Adapter'),
			new ClassMethods(false),
			new Customers()
		);
	}
	
    /**
     * Factory for zend-servicemanager v2.
     *
     * Proxies to `__invoke()`.
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(
		ServiceLocatorInterface $serviceLocator
	) {
        return $this(
			$serviceLocator,
			FgCustomers\Service\DbCustomersMapperFactory
		);
    }
}