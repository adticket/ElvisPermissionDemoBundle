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

namespace Adticket\Elvis\PermissionDemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Form zum demonstrieren dynamischer Formulare
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package AdTicket:Elvis:PermissionDemoBundle
 * @category Forms
 */
class ArticleType extends AbstractType
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    private $subscriber;

    /**
     * @param \Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber
     */
    public function __construct(EventSubscriberInterface $subscriber = null)
    {
        $this->subscriber = $subscriber;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('label' => 'Titel'));
        $builder->add('text', 'textarea', array('label' => 'Text'));
        if ($this->subscriber !== null) $builder->addEventSubscriber($this->subscriber);
    }

    public function getName()
    {
        return 'adticket_elvis_permissiondemo_article';
    }
}
