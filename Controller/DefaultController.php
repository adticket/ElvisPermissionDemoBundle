<?php

namespace Adticket\Elvis\PermissionDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="permissiondemo_index")
     * @Template()
     * @Secure("ELVISMODULE_PERMISSIONDEMO_VIEW")
     */
    public function indexAction()
    {
        return array();
    }
}
