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
namespace FgCustomers\Model;

use FgCustomers\Interfaces\CustomersInterface;
/**
 * Customers Model
 *
 * @category Model
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class Customers implements CustomersInterface
{
	/*
	* @var int $id Id
	*/
	protected $id;
	
	/*
	* @var string $name Name
	*/
	protected $name;
	
	/*
	* @var string $customerid
	*/
	protected $customerid;
	
	/*
	* @var string $phone
	*/
	protected $phone;
	
	/*
	* @var string $company
	*/
	protected $company;
	
	/**
	* {@inheritDoc}
	*/
	public function getId()
	{
		return $this->id;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getName()
	{
		return $this->name;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getCustomerId()
	{
		return $this->customerid;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getPhone()
	{
		return $this->phone;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function getCompany()
	{
		return $this->company;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setId($value)
	{
		$this->id = $value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setCustomerId($value)
	{
		$this->customerid = $value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setPhone($value)
	{
		$this->phone = $value;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function setCompany($value)
	{
		$this->company = $value;
	}
}