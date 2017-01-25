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
 * CustomersMapperInterface
 *
 * @category Interface
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
interface CustomersMapperInterface
{
     /**
      * Find customer by id
      *
	  * @param int $id
	  * @return ConfigurationInterface
      * @throws \InvalidArgumentException
      */
     public function findById($id);

     /**
      * List Customers
      *
	  * @param int   $start Start
	  * @param limit $limit Limit
	  *
	  * @return CustomersInterface
      * @throws \InvalidArgumentException
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