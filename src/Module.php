<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * Module
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers;

use Zend\EventManager\EventInterface as Event;
/**
 * Module Class
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class Module
{
    /**
    * Get Module configuration
    *
    * @return array
    */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

}
