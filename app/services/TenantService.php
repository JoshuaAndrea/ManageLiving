<?php
require_once __DIR__ . '/../models/Tenant.php';
require_once __DIR__ . '/../repositories/TenantRepository.php';
class TenantService{
    
    private TenantRepository $tenantRepository;

    public function __construct(){
        $this->tenantRepository = new TenantRepository();
    }

    public function getTenantById(int $id) : ?Tenant{
        return $this->tenantRepository->getTenantById($id);
    }

    public function getAllTenants() : array{
        return $this->tenantRepository->getAllTenants();
    }

    public function insertTenant($data) : void{
        $tenant = new Tenant();
        $tenant->setFirstName($data->firstName);
        $tenant->setLastName($data->lastName);
        $tenant->setEmail($data->email);
        $tenant->setPhoneNumber($data->phoneNumber);
        $tenant->setDateOfBirth($data->dateOfBirth);
        
        $this->tenantRepository->insertTenant($tenant);
    }

    public function updateTenant($data) : void{

        $tenant = new Tenant();
        $tenant->setId($data->tenantId);
        $tenant->setFirstName($data->firstName);
        $tenant->setLastName($data->lastName);
        $tenant->setEmail($data->email);
        $tenant->setPhoneNumber($data->phoneNumber);
        $tenant->setDateOfBirth($data->dateOfBirth);

        $this->tenantRepository->updateTenant($tenant);
    }

    public function deleteTenant(int $id) : void{
        $this->tenantRepository->deleteTenant($id);
    }
}