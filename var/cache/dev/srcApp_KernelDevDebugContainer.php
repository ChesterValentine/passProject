<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDFdIdYM\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDFdIdYM/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDFdIdYM.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDFdIdYM\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerDFdIdYM\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'DFdIdYM',
    'container.build_id' => '0584b091',
    'container.build_time' => 1552106935,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDFdIdYM');
