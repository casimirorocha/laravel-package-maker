<?php

namespace Casimirorocha\LaravelPackageMaker;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\ServiceProvider;
use Casimirorocha\LaravelPackageMaker\Commands\AddPackage;
use Casimirorocha\LaravelPackageMaker\Commands\ClonePackage;
use Casimirorocha\LaravelPackageMaker\Commands\Database\FactoryMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Database\MigrationMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Database\SeederMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\DeletePackageCredentials;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ChannelMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ConsoleMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\EventMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ExceptionMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\JobMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ListenerMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\MailMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ModelMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\NotificationMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ObserverMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\PolicyMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ProviderMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\RequestMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\ResourceMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\RuleMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Foundation\TestMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\NovaMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\BaseTestMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\CodecovMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\ComposerMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\ContributionMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\GitignoreMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\LicenseMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\PhpunitMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\ReadmeMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\StyleciMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Package\TravisMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\PackageMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Replace;
use Casimirorocha\LaravelPackageMaker\Commands\Routing\ControllerMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Routing\MiddlewareMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\SavePackageCredentials;
use Casimirorocha\LaravelPackageMaker\Commands\Standard\AnyMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Standard\ContractMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Standard\InterfaceMakeCommand;
use Casimirorocha\LaravelPackageMaker\Commands\Standard\TraitMakeCommand;

class LaravelPackageMakerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(MigrationCreator::class)
            ->needs('$customStubPath')
            ->give(function ($app) {
                return $app->basePath('stubs');
            });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands(
            array_merge(
                $this->routingCommands(),
                $this->packageCommands(),
                $this->databaseCommands(),
                $this->standardCommands(),
                $this->foundationCommands(),
                $this->packageInternalCommands()
            )
        );
    }

    /**
     * Get package database related commands.
     *
     * @return array
     */
    protected function databaseCommands()
    {
        return [
            SeederMakeCommand::class,
            FactoryMakeCommand::class,
            MigrationMakeCommand::class,
        ];
    }

    /**
     * Get package foundation related commands.
     *
     * @return array
     */
    protected function foundationCommands()
    {
        return [
            JobMakeCommand::class,
            MailMakeCommand::class,
            TestMakeCommand::class,
            RuleMakeCommand::class,
            EventMakeCommand::class,
            ModelMakeCommand::class,
            PolicyMakeCommand::class,
            ConsoleMakeCommand::class,
            RequestMakeCommand::class,
            ChannelMakeCommand::class,
            ProviderMakeCommand::class,
            ListenerMakeCommand::class,
            ObserverMakeCommand::class,
            ResourceMakeCommand::class,
            ExceptionMakeCommand::class,
            NotificationMakeCommand::class,
        ];
    }

    /**
     * Get package related commands.
     *
     * @return array
     */
    protected function packageCommands()
    {
        return [
            NovaMakeCommand::class,
            ReadmeMakeCommand::class,
            TravisMakeCommand::class,
            LicenseMakeCommand::class,
            PhpunitMakeCommand::class,
            StyleciMakeCommand::class,
            CodecovMakeCommand::class,
            ComposerMakeCommand::class,
            BaseTestMakeCommand::class,
            GitignoreMakeCommand::class,
            ContributionMakeCommand::class,
        ];
    }

    /**
     * Get package internal related commands.
     *
     * @return array
     */
    protected function packageInternalCommands()
    {
        return [
            Replace::class,
            AddPackage::class,
            ClonePackage::class,
            PackageMakeCommand::class,
            SavePackageCredentials::class,
            DeletePackageCredentials::class,
        ];
    }

    /**
     * Get package routing related commands.
     *
     * @return array
     */
    protected function routingCommands()
    {
        return [
            ControllerMakeCommand::class,
            MiddlewareMakeCommand::class,
        ];
    }

    /**
     * Get standard related commands.
     *
     * @return array
     */
    protected function standardCommands()
    {
        return [
            AnyMakeCommand::class,
            TraitMakeCommand::class,
            ContractMakeCommand::class,
            InterfaceMakeCommand::class,
        ];
    }
}
