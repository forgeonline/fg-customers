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

use FgCustomers\Interfaces\CustomersServiceInterface;
use FgCustomers\Mapper\DbCustomersMapper;
/**
 * ConfigurationManager Class
 *
 * @category Manager
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class CustomersManager implements CustomersServiceInterface
{
	/*
	* @var FgCustomers\Interfaces\ConfigurationMapperInterface
	*/
	protected $configMapper;
	
	public function __construct(DbCustomersMapper $configMapper)
	{
		$this->configMapper = $configMapper;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function listCustomers($offset=0, $limit=20)
	{
		return $this->configMapper->listCustomers($offset, $limit);
	}
	
	/**
	* {@inheritDoc}
	*/
	public function findById($id)
	{
		return $this->configMapper->findById($id);	
	}
	
	/**
	* {@inheritDoc}
	*/
	public function save(\FgCustomers\Interfaces\CustomersInterface $customer)
	{
		return $this->configMapper->save($customer);	
	}
}