<?php

namespace Larabill\Providers;

use Illuminate\Support\ServiceProvider;
use Larabill\Repositories\AreaRepository;
use Larabill\Repositories\BaseRepository;
use Larabill\Repositories\BillingRepository;
use Larabill\Repositories\BranchRepository;
use Larabill\Repositories\CurrencyRepository;
use Larabill\Repositories\CustomerRepository;
use Larabill\Repositories\CustomerRequestRepository;
use Larabill\Repositories\DepartmentRepository;
use Larabill\Repositories\DesignationRepository;
use Larabill\Repositories\FundRepository;
use Larabill\Repositories\Interfaces\AreaRepositoryInterface;
use Larabill\Repositories\Interfaces\BaseRepositoryInterface;
use Larabill\Repositories\Interfaces\BillingRepositoryInterface;
use Larabill\Repositories\Interfaces\BranchRepositoryInterface;
use Larabill\Repositories\Interfaces\CurrencyRepositoryInterface;
use Larabill\Repositories\Interfaces\CustomerRepositoryInterface;
use Larabill\Repositories\Interfaces\CustomerRequestInterface;
use Larabill\Repositories\Interfaces\CustomerRequestRepositoryInterface;
use Larabill\Repositories\Interfaces\DepartmentRepositoryInterface;
use Larabill\Repositories\Interfaces\DesignationRepositoryInterface;
use Larabill\Repositories\Interfaces\FundRepositoryInterface;
use Larabill\Repositories\Interfaces\MikrotikRouterRepositoryInterface;
use Larabill\Repositories\Interfaces\PackageRepositoryInterface;
use Larabill\Repositories\Interfaces\PaymentRepositoryInterface;
use Larabill\Repositories\Interfaces\ResellerRepositoryInterface;
use Larabill\Repositories\Interfaces\SupportReplyRepositoryInterface;
use Larabill\Repositories\Interfaces\SupportRepositoryInterface;
use Larabill\Repositories\Interfaces\SupportTypeRepositoryInterface;
use Larabill\Repositories\Interfaces\TeamRepositoryInterface;
use Larabill\Repositories\Interfaces\UserRepositoryInterface;
use Larabill\Repositories\MikrotikRouterRepository;
use Larabill\Repositories\PackageRepository;
use Larabill\Repositories\PaymentRepository;
use Larabill\Repositories\ResellerRepository;
use Larabill\Repositories\SupportReplyRepository;
use Larabill\Repositories\SupportRepository;
use Larabill\Repositories\SupportTypeRepository;
use Larabill\Repositories\TeamRepository;
use Larabill\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ResellerRepositoryInterface::class, ResellerRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(DesignationRepositoryInterface::class, DesignationRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(FundRepositoryInterface::class, FundRepository::class);
        $this->app->bind(AreaRepositoryInterface::class, AreaRepository::class);
        $this->app->bind(MikrotikRouterRepositoryInterface::class, MikrotikRouterRepository::class);
        $this->app->bind(BranchRepositoryInterface::class, BranchRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(SupportRepositoryInterface::class, SupportRepository::class);
        $this->app->bind(SupportReplyRepositoryInterface::class, SupportReplyRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerRequestRepositoryInterface::class, CustomerRequestRepository::class);
        $this->app->bind(SupportTypeRepositoryInterface::class, SupportTypeRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(BillingRepositoryInterface::class, BillingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
