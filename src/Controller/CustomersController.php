<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * CustomersController
 *
 * PHP version 5
 *
 * @category Module
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
namespace FgCustomers\Controller;

use FgHome\Controller\AdminController;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;
use Zend\Mvc\MvcEvent;
use Zend\view\Model\ViewModel;
use Zend\Hydrator\HydratorInterface;
use FgCustomers\Interfaces\CustomersInterface;
use FgCore\Model\zbeMessage;

/**
 * CustomersController Class
 *
 * @category Controller
 * @package  FgCustomers
 * @author   Don Nuwinda <nuwinda@gmail.com>
 * @license  GPL http://forge.co.nz
 * @link     http://forge.co.nz
 */
class CustomersController extends AdminController
{
	/*
	* @var Zend\ServiceManager\ServiceLocatorInterface
	*/
	protected $services;
	/*
	* @var Interop\Container\ContainerInterface
	*/
	protected $container;
	
	protected $authService;
	
	/**
	* @var \Zend\Stdlib\Hydrator\HydratorInterface
	*/
	protected $hydrator;
	
	/*
	* @var FgCore\Manager\ConfigurationManager
	*/
	protected $configurationManager;
	
	/**
	* @var \FgCustomers\Model\CustomersInterface
	*/
	protected $customersPrototype;
	
	public function __construct(
		ContainerInterface $container,
		HydratorInterface $hydrator,
		CustomersInterface $customersType
	) {
		$this->container = $container;
		$this->hydrator  = $hydrator;
		$this->customerstPrototype = $customersType;
	}
	
	protected function adminSetup()
	{
		$this->getAdminHeader();
		$this->getAdminSidebarmenu();
		$this->getAdminFooter();
	}
	
	public function newAction()
	{
		$this->adminSetup();
		$layout = $this->layout();
		$layout->setTemplate('dashboard/index/layout');
	}
	
	public function saveAction()
	{
		$post = $this->getRequest()->getPost()->customer;
		$customer = $this->hydrator->hydrate($post, $this->customerstPrototype);
		$customers = $this->container->get('FgCustomers\Service\CustomersFactory');
		try {
			$result = $customers->save($customer);
			if($result) {
				$message = new zbeMessage();
				$message->setSuccess(sprintf('Customer id %s, save success',$customer->getId()));
				return $this->redirect()->toRoute('customers');
			}
		} catch(Exception $e) {
			throw new \Exception($e->getMessage());
		}

		$layout = $this->layout();
		$layout->setTemplate('login/process/layout');
	}
	
	public function indexAction()
	{
		$this->adminSetup();
        $customers = $this->getCustomers();
		$view = new ViewModel(
            array('customers' => $customers)
        );
		$layout = $this->layout();
		$layout->setTemplate('dashboard/index/layout');
        return $view;
	}
    
	public function editAction()
	{
		$id = $this->getEvent()->getRouteMatch()->getParam('id');
		
		//\Zend\Debug\Debug::dump($customer);die();
		
		$this->adminSetup();
		
		$customerId = $this->getRequest()->getPost()->postaction;
		$customerFactory = $this->container->get('FgCustomers\Service\CustomersFactory');
		$customer = $customerFactory->findById($id);
		$view = new ViewModel(
			array(
				'customer' => $customer,
				'edit' 		=> true,
				'id' 		=> $id
				)
		);
		$layout = $this->layout();
		$layout->setTemplate('dashboard/index/layout');
        return $view;
	}
	
	protected function getCustomers(){
		$customers = $this->container->get('FgCustomers\Service\CustomersFactory');
		return $customers->listCustomers();
	}
}
