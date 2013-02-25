<?php

//  +--------------------------------------------------+
//  | Copyright (c) Ad ticket GmbH                     |
//  | All rights reserved.                             |
//  +--------------------------------------------------+
//  | This source code is protected by international   |
//  | copyright law and may not be distributed without |
//  | written permission by                            |
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
 * Modifiziert das Formular ArticleType anhand der aktuell verfügbaren Rechte
 *
 * @author Markus Tacker <m@coderbyheart.de>
 */
class ArticleTypeSubscriber implements EventSubscriberInterface
{
    /**
     * @var \Symfony\Component\Form\FormFactoryInterface
     */
    private $factory;

    /**
     * @var \Adticket\Elvis\CoreBundle\Modules\AccessChecker
     */
    private $accessChecker;

    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $securityContext;

    public function __construct(FormFactoryInterface $factory, AccessChecker $accessChecker, SecurityContextInterface $securityContext)
    {
        $this->factory = $factory;
        $this->accessChecker = $accessChecker;
        $this->securityContext = $securityContext;
    }

    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    /**
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