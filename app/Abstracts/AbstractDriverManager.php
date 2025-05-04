<?php

namespace App\Abstracts;


use App\Contracts\DriverInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use LogicException;
use RuntimeException;


abstract class AbstractDriverManager
{
    /**
     * @var Collection<DriverInterface>
     */
    protected Collection $drivers;


    public function __construct()
    {
        $this->drivers = collect();
    }


    public function getDriver(mixed $key): DriverInterface
    {
        $driver = $this->drivers->firstWhere(fn(DriverInterface $driver) => $key === $driver::key());

        if (! $driver) {
            throw new InvalidArgumentException("Driver with key [$key] does not exist.");
        }

        return $driver;
    }


    public function getDrivers(): Collection
    {
        return $this->drivers;
    }


    public function mapForSelect(): Collection
    {
        return $this->drivers->mapWithKeys(fn(DriverInterface $driver) => [
            $driver::key() => $driver->getLabel(),
        ]);
    }


    /**
     * @throws RuntimeException|BindingResolutionException
     */
    public function register(Container $container, string $class): void
    {
        if (! class_exists($class)) {
            throw new RuntimeException("Driver [$class] doesn't exist.");
        }

        $driver = $container->make($class);

        if (! $this->isValidDriver($driver)) {
            throw new LogicException("Driver class [$class] must implement the correct interface.");
        }

        $this->drivers->put($driver::key(), $driver);
    }


    protected function isValidDriver(mixed $driver): bool
    {
        return $driver instanceof DriverInterface;
    }
}
