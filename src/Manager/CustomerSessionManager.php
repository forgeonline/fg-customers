<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * Manager
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers\Manager;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * CustomerSessionManager Class
 *
 * @category Manager
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class CustomerSessionManager
{
    protected $servicelocator;
    
    /**
     * Constructor.
     *
     * @param ServiceLocatorInterface $servicelocator ServiceLocatorInterface
     *
     * @return void
     */
    public function __construct(ServiceLocatorInterface $servicelocator)
    {
        $this->servicelocator = $servicelocator;     
    }

}