<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * Interface
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers\Interfaces;

/**
 * CustomersServiceInterface
 *
 * @category Interface
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
interface CustomersServiceInterface
{
     /**
      * Return all Configuration
      *
      * @param  string $name 
	  * @return null|ConfigurationInterface
      */
     public function findById($name);

     /**
      * Return all list
      *
      * @return array|ConfigurationInterface[]
      */
     public function listCustomers($offset, $limit);
	 
     /**
      * Save customer
      *
	  * @param customerInterface $customer Customer
	  *
	  * @return CustomersInterface
      * @throws \InvalidArgumentException
      */
     public function save(\FgCustomers\Interfaces\CustomersInterface $customer);
}