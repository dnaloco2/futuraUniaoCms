<?php 

namespace CmsRest;

return array(
    'controllers' => array(
        'invokables' => array(
            __NAMESPACE__ . '\Controller\CorretoresRest' => __NAMESPACE__ .  '\Controller\CorretoresRestController',
            __NAMESPACE__ . '\Controller\EmailRest' => __NAMESPACE__ .  '\Controller\EmailRestController',
            __NAMESPACE__ . '\Controller\ConteudoRest' => __NAMESPACE__ .  '\Controller\ConteudoRestController',
            __NAMESPACE__ . '\Controller\LinksRest' => __NAMESPACE__ .  '\Controller\LinksRestController',
            __NAMESPACE__ . '\Controller\ArquivosRest' => __NAMESPACE__ .  '\Controller\ArquivosRestController',
            __NAMESPACE__ . '\Controller\FormContato' => __NAMESPACE__ .  '\Controller\FormContatoController',
        )
    ),
    'router' => array(
        'routes' => array(
            'formcontato' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/api/formcontato',
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'FormContato',
                    ),
                ),
            ),
            'upload-images-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/upload/images[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'UploadRest'
                    )
                )
            ),

            'colaboradores-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/corretores[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'CorretoresRest'
                    )
                )
            ),

            'users-email' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/checkemail[/:email]',
                    'constraints' => array(
                        'email' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'EmailRest'
                    )
                )
            ),

            'conteudo-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/conteudo[/:categoria[/:id]]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'ConteudoRest'
                    )
                )
            ),

            'arquivo-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/arquivo[/:categoria[/:id]]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'ArquivosRest'
                    )
                )
            ),

            'links-rest' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/links[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => __NAMESPACE__ . '\Controller',
                        'controller' => 'LinksRest'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
);