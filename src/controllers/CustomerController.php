<?php
namespace TaxSure\controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TaxSure\entities\Customer;


class CustomerController extends BaseController
{

    protected $customerRepository;

    public function __construct()
    {
        $this->customerRepository = self::$entityManager->getRepository(Customer::class);
    }

    public function getCustomersList(Request $request)
    {
        $customers = $this->customerRepository->findAll();

        return new JsonResponse(
            ['data' => $customers]
        );
    }

    public function getCustomer(Request $request, $id)
    {
        $customer = self::$entityManager->find(Customer::class, $id);

        if ($customer === null) {
            return new JsonResponse(['status' => 'fail'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse(
            ['data' => (array) $customer]
        );
    }

    public function createCustomer(Request $request)
    {
        $customer = new Customer();

        $data = json_decode($request->getContent(), true);
        $this->_createOrUpdateEntity($data, $customer);

        return new JsonResponse(['status' => 'success']);
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = self::$entityManager->find(Customer::class, $id);

        if ($customer === null) {
            return new JsonResponse(['status' => 'fail'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $this->_createOrUpdateEntity($data, $customer);

        return new JsonResponse(['status' => 'success']);
    }

    protected function _createOrUpdateEntity(array $data, Customer $customer)
    {
        foreach ($data as $key => $value) {
            $methodName = "set" . ucfirst($key);

            if (method_exists($customer, $methodName)) {
                $customer->$methodName($value);
            }
        }

        self::$entityManager->persist($customer);
        self::$entityManager->flush();
    }

}
