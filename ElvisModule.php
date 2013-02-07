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
 * @category Modules
 */

namespace Adticket\Elvis\PermissionDemoBundle;

use Adticket\Elvis\CoreBundle\Modules\ModulePermission;

/**
 * Beschreibt die Rechte eines Moduls
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package AdTicket:Elvis:PermissionDemoBundle
 * @category Modules
 */
class ElvisModule implements \Adticket\Elvis\CoreBundle\Modules\Module
{
    /**
     * Gibt den Identifier des Moduls zurück
     *
     * @return mixed
     */
    function getIdentifier()
    {
        return 'permissiondemo';
    }

    /**
     * Gibt den Namen des Moduls zurück
     *
     * @return string
     */
    function getName()
    {
        return 'Rechte-Modell-Demo';
    }

    /**
     * Gibt die Beschreibung des Moduls zurück
     *
     * @return string
     */
    function getDescription()
    {
        return 'Das ' . $this->getName() . '-Bundle zeigt beispielhaft die Verwendung des Elvis-Rechtemodells.';
    }

    /**
     * Gibt die Identifier der Module zurück, die benötigt werden
     *
     * @return string[]
     */
    function getDependencies()
    {
        return array();
    }

    /**
     * Gibt eine Liste mit Rechte zurück, die dieses Modul verwendet
     *
     * @return \Adticket\Elvis\CoreBundle\Modules\ModulePermission[]
     */
    function getPermissions()
    {
        return array(
            ModulePermission::factory($this, ModulePermission::PERMISSION_VIEW)
        );
    }
}