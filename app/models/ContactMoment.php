<?php

class ContactMoment
{
    public int $id;
    public string $datetime;
    public string $contactType;
    public string $title;
    public string $message;
    public bool $isResolved;
    public int $tenantId;
}