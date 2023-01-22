<?php

class Address implements JsonSerializable
{
    private int $addressId;
    private string $streetname;
    private int $housenumber;
    private ?string $extension;
    private string $postcode;
    private string $city;
    private ?int $tenantId;

    public function jsonSerialize() : mixed{
        return [
            'addressId' => $this->addressId,
            'streetname' => $this->streetname,
            'housenumber' => $this->housenumber,
            'extension' => $this->extension,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'tenantId' => $this->tenantId
        ];
    }

    public function getId() : int
    {
        return $this->addressId;
    }

    public function setId(int $id) : void
    {
        $this->addressId = $id;
    }

    public function getStreetname() : string
    {
        return $this->streetname;
    }

    public function setStreetname(string $streetname) : void
    {
        $this->streetname = $streetname;
    }

    public function getHousenumber() : int
    {
        return $this->housenumber;
    }

    public function setHousenumber(int $housenumber) : void
    {
        $this->housenumber = $housenumber;
    }

    public function getExtension() : ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension) : void
    {
        $this->extension = $extension;
    }

    public function getPostcode() : string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode) : void
    {
        $this->postcode = $postcode;
    }

    public function getCity() : string
    {
        return $this->city;
    }

    public function setCity(string $city) : void
    {
        $this->city = $city;
    }

    public function getTenantId() : ?int
    {
        return $this->tenantId;
    }

    public function setTenantId(int $tenantId) : void
    {
        $this->tenantId = $tenantId;
    }
}


