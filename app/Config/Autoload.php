<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

/**
 * -------------------------------------------------------------------
 * AUTOLOADER CONFIGURATION
 * -------------------------------------------------------------------
 * 
 * Este archivo configura los namespaces y mapas de clases necesarios.
 * 
 */
class Autoload extends AutoloadConfig
{
    /**
     * -------------------------------------------------------------------
     * Namespaces
     * -------------------------------------------------------------------
     * Mapea los namespaces en tu aplicación con sus ubicaciones
     * en el sistema de archivos.
     */
    public $psr4 = [
        APP_NAMESPACE => APPPATH, // El namespace principal de tu aplicación
        'Kenjis\CI4Twig' => ROOTPATH . 'vendor/kenjis/codeigniter4-twig/src', // Agrega Twig aquí
    ];

    /**
     * -------------------------------------------------------------------
     * Class Map
     * -------------------------------------------------------------------
     * Este mapa proporciona ubicaciones exactas de clases.
     */
    public $classmap = [];

    /**
     * -------------------------------------------------------------------
     * Files
     * -------------------------------------------------------------------
     * Archivos adicionales que deben cargarse automáticamente.
     */
    public $files = [];

    /**
     * -------------------------------------------------------------------
     * Helpers
     * -------------------------------------------------------------------
     * Lista de helpers que se deben cargar automáticamente.
     */
    public $helpers = [];
}
