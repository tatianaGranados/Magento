no es recomendado usar plugin around es mejor separar

public void aroundNombreMetodo(<class> $subject, callable $proceed){
    $result=$proceed();
    return $result;
}

callable $proceeed



route: http://m2git.devbox/pluginAround/index/ejemplo
