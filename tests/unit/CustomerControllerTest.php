<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TaxSure\controllers\BaseController;
use TaxSure\controllers\CustomerController;
use Doctrine\ORM\EntityManager;
use TaxSure\entities\Customer;


class CustomerControllerTest extends TestCase
{

    protected $entityManager;
    protected $request;

    protected function setUp()
    {
        parent::setUp();

        $this->entityManager = $this->createMock(EntityManager::class);
        $this->entityManager->expects($this->any())->method('getRepository')->willReturn([]);

        $this->request = $this->createMock(Request::class);
    }


    public function testCreateCustomer()
    {

    }

    public function testUpdateCustomer()
    {

    }

    public function testGetCustomersList()
    {

    }

    public function testGetCustomer()
    {
        $customer = new Customer();

        $this->entityManager->expects($this->any())
            ->method('find')->willReturn($customer);

        BaseController::$entityManager = $this->entityManager;
        $controller = new CustomerController();

        $res = $controller->getCustomer($this->request, 1);

        $this->assertInstanceOf(JsonResponse::class, $res);
        $response = $res->getContent();
        $this->assertStringContainsString('data', $response);
    }
}
