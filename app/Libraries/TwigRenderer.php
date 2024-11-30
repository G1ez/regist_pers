<?php

namespace App\Libraries;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class TwigRenderer
{
    private $twig;

    public function __construct()
    {
        // Configurar el cargador de vistas
        $loader = new FilesystemLoader(APPPATH . 'Views');
        $this->twig = new Environment($loader);

        // Registrar funciones personalizadas
        $this->registerFunctions();
    }

    /**
     * Renderizar una vista
     *
     * @param string $view Nombre de la vista (sin extensión .twig)
     * @param array $data Datos para pasar a la vista
     * @return void
     */
    public function render($view, $data = [])
    {
        echo $this->twig->render($view . '.twig', $data);
    }

    /**
     * Registrar funciones personalizadas en Twig
     */
    private function registerFunctions()
    {
        // Función para obtener datos "old" de CodeIgniter
        $this->twig->addFunction(new TwigFunction('old', function ($key) {
            return old($key);
        }));

        // Función para acceder a datos de la sesión
        $this->twig->addFunction(new TwigFunction('session', function ($key) {
            return session()->get($key);
        }));

        // Función para incluir validaciones (errores)
        $this->twig->addFunction(new TwigFunction('validation_errors', function () {
            return \Config\Services::validation()->getErrors();
        }));
    }
}
