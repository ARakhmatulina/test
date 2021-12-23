<?php

namespace App\Domains\Order\Services;

use App\Contracts\ApiService;
use App\Domains\Company\Entities\CompanyEntity;
use App\Domains\Company\Repositories\ApiCompaniesRepository;
use App\Domains\Company\Services\ApiGetCompanyService;
use App\Domains\Order\Repositories\ApiOrdersRepository;
use App\Domains\Order\VOs\OrderDataVO;

class ApiCreateOrderService implements ApiService
{

    private ApiOrdersRepository $ordersRepository;

    public function __construct(
        private OrderDataVO $orderData
    )
    {
        $this->ordersRepository = new ApiOrdersRepository();
    }

    public function handle()
    {
        $company = $this->getCompanyById();
        $dishes = $this->getDishes();
    }

    private function getCompanyById() : CompanyEntity
    {
        $company_repository = new ApiCompaniesRepository();
        return $company_repository->getById($this->orderData->getCompanyId());
    }

    private function getDishes() : array
    {
        
    }
}
