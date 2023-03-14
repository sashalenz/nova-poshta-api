<?php

namespace Sashalenz\NovaPoshtaApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class NovaPoshtaApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('nova-poshta-api')
            ->hasConfigFile();
    }
}
