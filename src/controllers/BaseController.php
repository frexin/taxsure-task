<?php


namespace TaxSure\controllers;


use Doctrine\ORM\EntityManager;

abstract class BaseController
{

    /**
     * @var EntityManager
     */
    public static $entityManager;
}
