<?php

namespace TaxSure\entities;


/**
 * @Entity @Table(name="customers")
 */
class Customer
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $firstName;

    /** @Column(type="string") **/
    protected $secondName;

    /** @Column(type="date")
     *
     * @var \DateTime
     */
    protected $dob;

    /** @Column(type="integer") **/
    protected $taxClass;

    /** @Column(type="string") **/
    protected $ssn;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @param string $secondName
     */
    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }

    /**
     * @return string
     */
    public function getDob(): string
    {
        $date = $this->dob->format("Y-m-d");

        return $date;
    }

    /**
     * @param string $dob
     */
    public function setDob(string $dob): void
    {
        $date = \DateTime::createFromFormat("Y-m-d", $dob);
        $this->dob = $date;
    }

    /**
     * @return int
     */
    public function getTaxClass(): int
    {
        return $this->taxClass;
    }

    /**
     * @param int $taxClass
     */
    public function setTaxClass(int $taxClass): void
    {
        $this->taxClass = $taxClass;
    }

    /**
     * @return string
     */
    public function getSsn(): string
    {
        return $this->ssn;
    }

    /**
     * @param string $ssn
     */
    public function setSsn(string $ssn): void
    {
        $this->ssn = $ssn;
    }
}
