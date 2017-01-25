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
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Hydrator\Reflection as ReflectionHydrator;
use FgCustomers\Model\Customers;


/**
 * ZendDbSqlMapper Mapper
 *
 * @category Mapper
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class DbCustomersMapper
implements CustomersMapperInterface
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
		$select->from('customer');
		$select->where(['id = ?' => $id]);
		$select->limit(1);

		$buildsql = $sql->buildSqlString($select);
		$result = $this->dbAdapter->query(
			$buildsql,
			$this->dbAdapter::QUERY_MODE_EXECUTE
		)->toArray();
		
		if ($result) {
			//\Zend\Debug\Debug::dump($this->customerstPrototype);die();
			return $this->hydrator->hydrate($result[0], $this->customersPrototype);
		}
		return false;
	}
	
	/**
	* {@inheritDoc}
	*/
	public function save(\FgCustomers\Interfaces\CustomersInterface $customer)
	{
		if($customer) {
			$sql    = new Sql($this->dbAdapter);
			if(!empty($customer->getId())){
				$query = $sql->update('customer');
				$query->set(
					[
						'name' => $customer->getName(),
						'customerid' => $customer->getCustomerId(),
						'phone' => $customer->getPhone(),
						'company' => $customer->getCompany(),
					]
				);
				$query->where(['id = ?' => $customer->getId()]);
			} else {
				$query = $sql->insert('customer');
				$query->columns(
					[
						$customer->getName() => 'name',
						$customer->getCustomerId() => 'customerid',
						$customer->getPhone() => 'phone',
						$customer->getCompany() => 'company',
					]
				);
			}
			$buildsql = $sql->buildSqlString($query);
			$result = $this->dbAdapter->query(
				$buildsql,
				$this->dbAdapter::QUERY_MODE_EXECUTE
			);
			if($result) {
				return true;
			}
			return false;
		}
	}

	/**
	* {@inheritDoc}
	*/
	public function listCustomers($offset, $limit)
	{
		$sql    = new Sql($this->dbAdapter);
		$select = $sql->select('customer');
		$select->limit($limit);
		if($offset) {
			$select->offset($offset);
		}
        
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet(new ReflectionHydrator, new Customers());
            $resultSet->initialize($result);
            return $resultSet;
        }
		return false;
	}

}