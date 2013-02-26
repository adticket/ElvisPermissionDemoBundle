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
 * Contains Article
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package Adticket:Elvis:PermissionDemoBundle
 * @category Models
 */

namespace Adticket\Elvis\PermissionDemoBundle\Model;

/**
 * Entity zum demonstrieren dynamischer Formulare
 *
 * @author Markus Tacker <m@coderbyheart.de>
 * @package AdTicket:Elvis:PermissionDemoBundle
 * @category Models
 */
class Article
{
    /**
     * @var string Titel
     */
    public $title;

    /**
     * @var string Text
     */
    public $text;

    /**
     * @var bool Artikel veröffentlicht?
     */
    public $publish = false;
}
