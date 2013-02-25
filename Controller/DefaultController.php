<?php

namespace Adticket\Elvis\PermissionDemoBundle\Controller;

use Adticket\Elvis\PermissionDemoBundle\Model\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller
{

    const PERMISSION_VIEW = 'VIEW';
    const PERMISSION_EDIT = 'EDIT';
    const PERMISSION_CREATE = 'CREATE';
    const PERMISSION_DELETE = 'DELETE';
    const PERMISSION_UNDELETE = 'UNDELETE';
    const PERMISSION_OPERATOR = 'OPERATOR';

    /**
     * @Route("/", name="permissiondemo_index")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_VIEW")
     */
    public function viewAction()
    {
        return array();
    }

    /**
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
     * @Route("/create", name="permissiondemo_create")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_CREATE")
     */
    public function createAction()
    {
        return array();
    }

    /**
     * @Route("/delete", name="permissiondemo_delete")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_DELETE")
     */
    public function deleteAction()
    {
        return array();
    }

    /**
     * @Route("/undelete", name="permissiondemo_undelete")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_UNDELETE")
     */
    public function undeleteAction()
    {
        return array();
    }

    /**
     * @Route("/operator", name="permissiondemo_operator")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_OPERATOR")
     */
    public function operatorAction()
    {
        return array();
    }
}
