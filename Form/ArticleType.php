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
 * Contains ArticleType
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package Adticket:Elvis:PermissionDemoBundle
 * @category Forms
 */

namespace Adticket\Elvis\PermissionDemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * This class is used to demonstrate the use of modularized forms
 *
 * See {@link http://symfony.com/doc/current/cookbook/form/dynamic_form_modification.html How to Dynamically Modify Forms Using Form Events} for more information
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package AdTicket:Elvis:PermissionDemoBundle
 * @category Forms
 */
class ArticleType extends AbstractType
{
    /**
     * References the subscriber modifing this form
     *
     * @var \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    private $subscriber;

    /**
     * Creates a new  {@link ArticleType} passing the subscriber modifing this form
     *
     * @param \Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber
     */
    public function __construct(EventSubscriberInterface $subscriber = null)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Createsthe form
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('label' => 'Titel'));
        $builder->add('text', 'textarea', array('label' => 'Text'));
        if ($this->subscriber !== null) $builder->addEventSubscriber($this->subscriber);
    }

    /**
     * Returns the name of the form
     *
     * @return string
     */
    public function getName()
    {
        return 'adticket_elvis_permissiondemo_article';
    }
}
