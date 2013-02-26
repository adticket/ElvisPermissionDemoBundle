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
 * Contains DefaultController
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package Adticket:Elvis:PermissionDemoBundle
 * @category Symfony2
 */

namespace Adticket\Elvis\PermissionDemoBundle\Controller;

use Adticket\Elvis\PermissionDemoBundle\Model\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Controller used to demonstrate the various elvis permission a module may provide
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package Adticket:Elvis:PermissionDemoBundle
 * @category Symfony2
 */
class DefaultController extends Controller
{

    const PERMISSION_VIEW = 'VIEW';
    const PERMISSION_EDIT = 'EDIT';
    const PERMISSION_CREATE = 'CREATE';
    const PERMISSION_DELETE = 'DELETE';
    const PERMISSION_UNDELETE = 'UNDELETE';
    const PERMISSION_OPERATOR = 'OPERATOR';

    /**
     * Display the view view, needs the ELVISMODULE_PERMISSIONDEMO_VIEW permission.
     *
     * @Route("/", name="permissiondemo_index")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_VIEW")
     */
    public function viewAction()
    {
        return array();
    }

    /**
     * Display the edit view, needs the ELVISMODULE_PERMISSIONDEMO_EDIT permission.
     *
     * This view also contains a form which is modified accordings to the users permissions.
     *
     * @Route("/edit", name="permissiondemo_edit")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_EDIT")
     */
    public function editAction()
    {
        $article = new Article();
        /** @var $form \Symfony\Component\Form\FormInterface */
        $form = $this->container->get('form.factory')->create('adticket_elvis_permissiondemo_article', $article);

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * Display the create view, needs the ELVISMODULE_PERMISSIONDEMO_CREATE permission.
     *
     * @Route("/create", name="permissiondemo_create")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_CREATE")
     */
    public function createAction()
    {
        return array();
    }

    /**
     * Display the delete view, needs the ELVISMODULE_PERMISSIONDEMO_DELETE permission.
     *
     * @Route("/delete", name="permissiondemo_delete")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_DELETE")
     */
    public function deleteAction()
    {
        return array();
    }

    /**
     * Display the undelete view, needs the ELVISMODULE_PERMISSIONDEMO_UNDELETE permission.
     *
     * @Route("/undelete", name="permissiondemo_undelete")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_UNDELETE")
     */
    public function undeleteAction()
    {
        return array();
    }

    /**
     * Display the operator view, needs the ELVISMODULE_PERMISSIONDEMO_OPERATOR permission.
     *
     * @Route("/operator", name="permissiondemo_operator")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_OPERATOR")
     */
    public function operatorAction()
    {
        return array();
    }
}
