<?php

class ContactMoment implements JsonSerializable
{
    private ?int $contactMomentId;
    private string $datetime;
    private string $contactType;
    private string $title;
    private string $message;
    private bool $isResolved;
    private int $addressId;

    public function withAttr(int $contactMomentid, string $datetime, int $contactType, string $title, string $message, bool $isResolved, int $addressId)
    {
        $this->contactMomentId = $contactMomentid;
        $this->datetime = $datetime;
        $this->contactType = $contactType;
        $this->title = $title;
        $this->message = $message;
        $this->isResolved = $isResolved;
        $this->addressId = $addressId;
    }

    public function jsonSerialize() : mixed{
        return [
            'id' => $this->contactMomentId,
            'datetime' => $this->datetime,
            'contactType' => $this->contactType,
            'title' => $this->title,
            'message' => $this->message,
            'isResolved' => $this->isResolved,
            'addressId' => $this->addressId
        ];
    }

    public function getId() : int
    {
        return $this->contactMomentId;
    }

    public function setId(?int $id) : void
    {
        $this->contactMomentId = $id;
    }

    public function getDatetime() : string
    {
        return $this->datetime;
    }

    public function setDatetime(string $datetime) : void
    {
        $this->datetime = $datetime;
    }

    public function getContactType() : string
    {
        return $this->contactType;
    }

    public function setContactType(string $contactType) : void
    {
        $this->contactType = $contactType;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function setMessage(string $message) : void
    {
        $this->message = $message;
    }

    public function getIsResolved() : bool
    {
        return $this->isResolved;
    }

    public function setIsResolved(bool $isResolved) : void
    {
        $this->isResolved = $isResolved;
    }

    public function getAddressId() : int
    {
        return $this->addressId;
    }

    public function setAddressId(int $addressId) : void
    {
        $this->addressId = $addressId;
    }

    

}