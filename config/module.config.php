<?php
/**
 * Zend Backend (http://forge.co.nz/)
 *
 * Config
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

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'customers' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/customers',
					'defaults' => [
						'controller' => Controller\CustomersController::class,
						'action'     => 'index',
					],
                ],
				'may_terminate' => true,
				'child_routes' => [
					'new' => [
						'type' => Literal::class,
						'options' => [
							'route' => '/new',
							'defaults' => [
								'action' => 'new',
							]
						],
					],
					'edit' => [
						'type' => Segment::class,
						'options' => [
							'route' => '/edit[/:action][/:id]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                'action'     => 'edit',
                            ],
						],
					],
					'save' => [
						'type' => Literal::class,
						'options' => [
							'route' => '/save',
							'defaults' => [
								'action' => 'save',
							]
						],
					],
				],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
			'customerSessions' => Service\CustomerSessionsFactory::class,
            'FgCustomers\Service\CustomersFactory' => Service\CustomersFactory::class,
			'FgCustomers\Mapper\DbCustomersMapper' => 'FgCustomers\Service\DbCustomersMapperFactory',
          ],
    ],
    'controllers' => [
        'factories' => [
			Controller\CustomersController::class => 'FgCustomers\Factory\CustomersControllerFactory',
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'fg-customers/customers/index'     => 
            __DIR__ . '/../view/index/index.phtml',
			'fg-customers/customers/new' 		=>
			__DIR__ . '/../view/index/new.phtml',
			'fg-customers/customers/edit' 		=>
			__DIR__ . '/../view/index/new.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
