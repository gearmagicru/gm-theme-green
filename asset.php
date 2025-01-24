<?php
/**
 * Регистрация пакетов ресурсов темы Green.
 * 
 * Тема Green.
 * 
 * @copyright Copyright (c) 2015-2024 GearMagic Web-студия
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

use Gm\View\ClientScript;

/**
 * Класс регистрация пакетов ресурсов темы.
 * 
 * @package Theme
 * @subpackage Green
 * @version 1.0
 */
class Asset extends \Gm\Theme\ThemeAsset
{
    /**
     * Формирует метаданные документа для страницы рабочего пространства панели 
     * управления.
     * 
     * @return void
     */
    public function workspace()
    {
        // регистрация JS и CSS пакетов
        $this->script
            ->appendPackages([
                // Workspace
                'workspace' => [
                    'position' => ClientScript::POS_HEAD,
                    'theme'    => true,
                    'noCache'  => true,
                    'css'       => [
                        'bootstrap.css' => ['/assets/css/bootstrap.css'],
                        'twitter.css'   => ['/vendors/twitter.css']
                    ]
                ],
                // Font Awesome
                'fontawesome' => [
                    'position' => ClientScript::POS_HEAD,
                    'vendor'   => true,
                    'noCache'  => true,
                    'css'       => [
                        'fontawesome' => ['/fontawesome/css/all.min.css']
                    ]
                ],
                // Application
                'app' => [
                    'position' => ClientScript::POS_HEAD,
                    'vendor'   => true,
                    'noCache'  => true,
                    'js'       => [
                        'panelBootstrap' => ['/gm/panel/bootstrap.js'],
                        'panelApp'       => ['/gm/panel/app.js']
                    ]
                ]
            ])
            ->registerPackages('workspace', 'fontawesome', 'app');
    }

    /**
     * Формирует метаданные документа для страницы авторизации и восстановления аккаунта
     * пользователя панели управления.
     * 
     * @return void
     */
    public function sign()
    {
        /** @var \Gm\View\Helper\Stylesheet $stylesheet регистрация CSS пакетов */
        $this->script->css
            ->registerThemeFile('wow', '/vendors/wow/css/animate.min.css', ClientScript::POS_HEAD)
            ->registerThemeFile('bootstrap', '/assets/css/bootstrap.css', ClientScript::POS_HEAD)
            ->registerThemeFile('form', '/assets/css/form.css', ClientScript::POS_HEAD);
        /** @var \Gm\View\Helper\Script $script регистрация JS пакетов */
        $this->script->js
            ->registerVendorFile('ext', '/gm/panel/ext/ext-core.js', ClientScript::POS_HEAD)
            ->registerVendorFile('form', '/gm/panel/singleton/Form.js', ClientScript::POS_HEAD);
    }
}
