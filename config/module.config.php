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
            'customer' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/customers',
                    'defaults' => [
                        'controller'    => Controller\CustomersController::class,
                        'action'        => 'index',
                    ],
                ],
				'may_terminate' => true,
				'child_routes' => [
					'logout' => [
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
    'controllers' => [
        'factories' => [
			Controller\CustomersController::class => 'FgCustomers\Factory\CustomersControllerFactory',
			'FgCustomers\Service\CustomersFactory' => Service\CustomersFactory::class,
			'FgCustomers\Mapper\DbCustomersMapper' => 'FgCustomers\Service\DbCustomersMapperFactory',
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'fg-customers/index/index'     => 
            __DIR__ . '/../view/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
