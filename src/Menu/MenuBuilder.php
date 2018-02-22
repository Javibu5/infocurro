<?php

/*
 * This file is part of the infocurro package.
 *
 * (c) Aula de Software Libre <aulasoftwarelibre@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Menu;

use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function mainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Inicio', ['route' => 'homepage']);

        $candidates = $menu->addChild('Candidatos', ['uri' => '#'])->setExtra('right-icon', 'fa fa-angle-down');
        $candidates->addChild('Ver trabajos', ['route' => 'jobs_list']);
        $candidates->addChild('Añadir currículum', ['route' => 'resume_edit']);
        $candidates->addChild('Ver currículum', ['route' => 'resume_show']);
        $candidates->addChild('Cambiar contraseña', ['route' => 'change_password']);

        $companies = $menu->addChild('Empresas', ['uri' => '#'])->setExtra('right-icon', 'fa fa-angle-down');
        $companies->addChild('Añadir oferta', ['route' => 'companies_job_add']);
        $companies->addChild('Administrar ofertas', ['route' => 'companies_job_list']);
        $companies->addChild('Administrar solicitudes', ['route' => 'companies_job_application_list']);

        $menu->addChild('Contactar', ['route' => 'contact']);
        $menu->addChild('Acerca de', ['route' => 'about']);

        return $menu;
    }

    public function mobileMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'wpb-mobile-menu');
        $menu->addChild('Inicio', ['route' => 'homepage']);

        $candidates = $menu->addChild('Candidatos', ['uri' => '#']);
        $candidates->addChild('Ver trabajos', ['route' => 'jobs_list']);
        $candidates->addChild('Añadir currículum', ['route' => 'resume_edit']);
        $candidates->addChild('Ver currículum', ['route' => 'resume_show']);
        $candidates->addChild('Cambiar contraseña', ['route' => 'change_password']);

        $companies = $menu->addChild('Empresas', ['uri' => '#']);
        $companies->addChild('Añadir oferta', ['route' => 'companies_job_add']);
        $companies->addChild('Administrar ofertas', ['route' => 'companies_job_list']);
        $companies->addChild('Administrar solicitudes', ['route' => 'companies_job_application_list']);

        $menu->addChild('Contactar', ['route' => 'contact']);
        $menu->addChild('Iniciar sesión', ['uri' => '#'])->setExtra('left-icon', 'ti-lock');

        return $menu;
    }

    public function loginMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right float-right');

        $menu->addChild('Publicar', ['route' => 'companies_job_add'])->setExtra('left-icon', 'ti-pencil-alt');
        $menu->addChild('Conectar', ['route' => 'login'])->setExtra('left-icon', 'ti-lock');

        return $menu;
    }
}
