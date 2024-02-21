<?php

namespace Interop\Container;

use Psr\Container\ContainerInterface;

/**
 * A service provider provides services and extensions to a container.
 */
interface ServiceProviderInterface
{
    /**
     * Lists all of the service IDs supported by this provider.
     * 
     * @return string[] list of service IDs
     */
    public function getServiceIDs(): array;

    /**
     * Create the service with the given ID.
     * 
     * Supported service IDs can be obtained from `getServiceIDs()` - using an unsupported
     * service ID will throw a `NotFoundExceptionInterface`.
     * 
     * @param string $id ID of the service to create
     * @param ContainerInterface $container the container to resolve service dependencies from
     * 
     * @return mixed the created service
     * 
     * @throws NotFoundExceptionInterface if the service ID is not supported
     * @throws ServiceProviderExceptionInterface if the service could not be created
     */
    public function createService(string $id, ContainerInterface $container): mixed;

    /**
     * Lists all of the extension IDs supported by this provider.
     * 
     * @return string[] list of extension IDs
     */
    public function getExtensionIDs(): array;

    /**
     * Extend the `$previous` service with the given ID.
     * 
     * Supported extension IDs can be obtained from `getExtensionIDs()` - using an unsupported
     * extension ID will throw a `NotFoundExceptionInterface`.
     * 
     * @param string $id ID of the service to extend
     * @param ContainerInterface $container the container to resolve extension dependencies from
     * @param mixed $previous the previous service (which will be extended)
     * 
     * @return mixed the extended service
     * 
     * @throws NotFoundExceptionInterface if the extension ID is not supported
     * @throws ServiceProviderExceptionInterface if the extension could not be applied
     */
    public function extendService(string $id, ContainerInterface $container, mixed $previous): mixed;
}
