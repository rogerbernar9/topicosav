<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = array(
            '/default' => array(array(array('_route' => 'default', '_controller' => 'App\\Controller\\DefaultController::index'), null, null, null, false, null)),
            '/pegar-sessao' => array(array(array('_route' => 'app_default_pegarsessao', '_controller' => 'App\\Controller\\DefaultController::pegarSessao'), null, null, null, false, null)),
            '/escrever-mensagem' => array(array(array('_route' => 'app_default_escrevermensagem', '_controller' => 'App\\Controller\\DefaultController::escreverMensagem'), null, null, null, false, null)),
            '/enviar-email' => array(array(array('_route' => 'app_default_email', '_controller' => 'App\\Controller\\DefaultController::email'), null, null, null, false, null)),
            '/logger' => array(array(array('_route' => 'app_default_logger', '_controller' => 'App\\Controller\\DefaultController::logger'), null, null, null, false, null)),
            '/filesystem' => array(array(array('_route' => 'app_default_filesystem', '_controller' => 'App\\Controller\\DefaultController::filesystem'), null, null, null, false, null)),
            '/finder' => array(array(array('_route' => 'app_default_finder', '_controller' => 'App\\Controller\\DefaultController::finder'), null, null, null, false, null)),
            '/session' => array(array(array('_route' => 'session', '_controller' => 'App\\Controller\\SessionController::index'), null, null, null, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/translate/([^/]++)(*:26)'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:64)'
                        .'|wdt/([^/]++)(*:83)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:128)'
                                .'|router(*:142)'
                                .'|exception(?'
                                    .'|(*:162)'
                                    .'|\\.css(*:175)'
                                .')'
                            .')'
                            .'|(*:185)'
                        .')'
                    .')'
                .')(?:/?)$}sDu',
        );
        $this->dynamicRoutes = array(
            26 => array(array(array('_route' => 'app_default_translate', '_controller' => 'App\\Controller\\DefaultController::translate'), array('nome'), null, null, false, null)),
            64 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, null)),
            83 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, null)),
            128 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, null)),
            142 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, null)),
            162 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, null)),
            175 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, null)),
            185 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, null)),
        );
    }
}
