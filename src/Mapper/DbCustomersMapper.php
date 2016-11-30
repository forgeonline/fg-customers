<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * Mapper
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers\Mapper;

use FgCustomers\Interfaces\CustomersMapperInterface;
use FgCustomers\Interfaces\CustomersInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\Hydrator\HydratorInterface;
/**
 * ZendDbSqlMapper Mapper
 *
 * @category Mapper
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class DbCustomersMapper implements CustomersMapperInterface
{
	/**
	* @var \Zend\Db\Adapter\AdapterInterface
	*/
	protected $dbAdapter;
	
	/**
	* @var \Zend\Stdlib\Hydrator\HydratorInterface
	*/
	protected $hydrator;
	
	/**
	* @var \FgCustomers\Model\CustomersInterface
	*/
	protected $customersPrototype;
	
	
	/**
	* @param AdapterInterface  $dbAdapter
	* @param HydratorInterface $hydrator
	* @param PostInterface    $postPrototype
	*/
	public function __construct(
		AdapterInterface $dbAdapter,
		HydratorInterface $hydrator,
		CustomersInterface $customersType
	) {
		$this->dbAdapter      = $dbAdapter;
		$this->hydrator       = $hydrator;
		$this->customersPrototype  = $customersType;
	}

	/*
	* @param int $id Id
	*
	* @return customersInterface
	* @throws \InvalidArgumentException
	*/
	public function findById($id)
	{
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select();
		$select->from('customers');
		$select->where(['id = ?' => $id]);
		$select->limit(1);

		$buildsql = $sql->buildSqlString($select);
		$result = $this->dbAdapter->query(
			$buildsql,
			$this->dbAdapter::QUERY_MODE_EXECUTE
		)->toArray();
		
		if ($result) {
			return $this->hydrator->hydrate($result[0], $this->customerstPrototype);
		}
		return false;
	}

	/*
	* @return array|customersInterface[]
	*/
	public function listCustomers($offset, $limit)
	{
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('customers');
		$select->limit($limit);
		$select->limit($offset);
		
		$buildsql = $sql->buildSqlString($select);
		$result = $this->dbAdapter->query(
			$buildsql,
			$this->dbAdapter::QUERY_MODE_EXECUTE
		)->toArray();
		
		if ($result) {
			return $result;
		}
		return false;
	}

}