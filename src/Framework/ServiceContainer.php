<?php

declare(strict_types=1);

namespace Framework;

use Closure;
use http\Exception\InvalidArgumentException;
use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;


class ServiceContainer
{

    /**
     * @var array Stores classes without default constructor for dependency-injection
     */
    private array $registry = [];

    /**
     * Construct class with recursive dependency injection
     * @param string $className Name of the class
     * @return object Constructed object
     * @throws ReflectionException
     */
    public function get(string $className): object
    {
        // If the class exists in the registry
        // call its closure and return that
        if (array_key_exists($className, $this->registry)) {
            return $this->registry[$className]();
        }

        $reflector = new ReflectionClass($className);
        $constructor = $reflector->getConstructor();

        // If the class doesn't have a constructor just return
        // a new instance of it
        if ($constructor === null) {
            return new $className;
        }

        $dependencies = [];
        $constructorParams = $constructor->getParameters();
        // Iterate the params in the constructor and instantiate them
        // then add them to the dependency list
        foreach ($constructorParams as $param) {
            $dependency = $param->getType();

            // Throw error if the dependency has no type specified
            if ($dependency === null) {
                throw new InvalidArgumentException("Constructor parameter '{$param->getName()}' in the $className class has no type declaration");

            // Throw error if the type is not a simple name type
            } else if (!($dependency instanceof ReflectionNamedType)) {
                throw new InvalidArgumentException("Constructor parameter '$dependency {$param->getName()}' has an invalid type declaration. Only single named types are accepted");
            // Builtin types have no constructor so throw error if we encounter one
            } else if ($dependency->isBuiltin()) {
                throw new InvalidArgumentException("Unable to construct parameter '$dependency {$param->getName()}' in the $className class");
            }
            // Recursively construct objects and add them to dependency list
            $dependencies[] = $this->get((string)$dependency);
        }

        // Construct the class with the dependencies
        return new $className(...$dependencies);
    }

    /**
     * @param string $name Name of the class
     * @param Closure $value Function that returns the constructed class
     * @return void
     */
    public function set(string $name, Closure $value): void
    {
        $this->registry[$name] = $value;
    }
}