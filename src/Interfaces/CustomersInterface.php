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
 * CustomersInterface
 *
 * @category Interface
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
interface CustomersInterface
{
     /**
      * Return configuration id
      *
      * @return int
      */
     public function getId();

     /**
      * Return the name
      *
      * @return string
      */
     public function getName();

     /**
      * Return Customer Id
      *
      * @return string
      */
     public function getCustomerId();
	 
     /**
      * Return Phone
      *
      * @return string
      */
     public function getPhone();
	 
	 
     /**
      * Return Company
      *
      * @return string
      */
     public function getCompany();
	 
     /**
      * Set id
	  *
      * @param int $value Value
      */
     public function setId($value);

     /**
      * Set name
      *
      * @param string $value Value
      */
     public function setName($value);

     /**
      * Set customer id
      *
      * @param string $value Value
      */
     public function setCustomerId($value);
	 
     /**
      * Set phone
      *
      * @param int $value Value
      */
     public function setPhone($value);
	 
     /**
      * Set Company
      *
      * @param int $value Value
      */
     public function setCompany($value);
}