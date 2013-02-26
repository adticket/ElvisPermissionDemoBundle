<?php

//  +--------------------------------------------------+
//  | Copyright (c) AD ticket GmbH                     |
//  | All rights reserved.                             |
//  +--------------------------------------------------+
//  | This source code is licensed under the           |
//  | GNU GENERAL PUBLIC LICENSE Version 3.            |
//  | See LICENSE for more information.                |
//  +--------------------------------------------------+
//  |   AD ticket GmbH                                 |
//  |   Kaiserstraße 69                                |
//  |   D-60329 Frankfurt am Main                      |
//  |                                                  |
//  |   phone: +49 (0)69 407 662 0                     |
//  |   fax:   +49 (0)69 407 662 50                    |
//  |   mail:  info@adticket.de                        |
//  |   web:   www.ADticket.de                         |
//  +--------------------------------------------------+

/**
 * Contains ArticleTypeSubscriber
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package Adticket:Elvis:PermissionDemoBundle
 * @category Forms
 */

namespace Adticket\Elvis\PermissionDemoBundle\Form\EventListener;

use Adticket\Elvis\CoreBundle\Modules\AccessChecker;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Security\Core\SecurityContextInterface;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Modifies the {@link ArticleType} according to the elvis permission granted to the user
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package Adticket:Elvis:PermissionDemoBundle
 * @category Forms
 */
class ArticleTypeSubscriber implements EventSubscriberInterface
{
    /**
     * Reference to the factory used to create new form elements
     *
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $factory;

    /**
     * Reference to the elvis access checker service
     *
     * @var \Adticket\Elvis\CoreBundle\Modules\AccessChecker
     */
    private $accessChecker;

    /**
     * Reference to symfony2's security context
     *
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $securityContext;

    /**
     * Creates a new subscriber passing the factory used to create new form elements, the elvis access checker service and symfony2's security context
     *
     * @param \Symfony\Component\Form\FormFactoryInterface $factory
     * @param \Adticket\Elvis\CoreBundle\Modules\AccessChecker $accessChecker
     * @param \Symfony\Component\Security\Core\SecurityContextInterface $securityContext
     */
    public function __construct(FormFactoryInterface $factory, AccessChecker $accessChecker, SecurityContextInterface $securityContext)
    {
        $this->factory = $factory;
        $this->accessChecker = $accessChecker;
        $this->securityContext = $securityContext;
    }

    /**
     * Tells symfony2 which events this subscriber acts upon
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    /**
     * Handle the event
     *
     * @param \Symfony\Component\Form\FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        /* @var $data \Adticket\Elvis\CoreBundle\Entity\User */
        $data = $event->getData();
        if (null === $data) {
            return;
        }
        if (!$this->accessChecker->hasPermission($this->securityContext->getToken()->getUser(), 'ELVISMODULE_PERMISSIONDEMO_ARTICLE_OPERATOR')) return;
        $form = $event->getForm();
        $form->add($this->factory->createNamed('publish', 'choice', null, array(
            'label' => 'Status',
            'choices' => array(0 => 'Entwurf', 1 => 'veröffentlicht'),
            'expanded' => true,
        )));
    }
}