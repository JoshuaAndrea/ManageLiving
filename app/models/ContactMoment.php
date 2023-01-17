<?php
require_once __DIR__ . '/../models/ContactType.php';

class ContactMoment
{
    private int $id;
    private string $datetime;
    private ContactType $contactType;
    private string $title;
    private string $message;
    private bool $isResolved;
    private int $addressId;

    public __construct(int $id, string $datetime, string $contactType, string $title, string $message, bool $isResolved, int $addressId)
    {
        $this->id = $id;
        $this->datetime = $datetime;
        $this->contactType = $contactType;
        $this->title = $title;
        $this->message = $message;
        $this->isResolved = $isResolved;
        $this->addressId = $addressId;
    }
}