<?php
/**
 * @author https://github.com/ThaDafinser
 */
namespace Piwik\Plugins\LdapConnection;

use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

class Menu extends \Piwik\Plugin\Menu
{

    public function configureAdminMenu(MenuAdmin $menu)
    {
        $menu->add('CoreAdminHome_MenuDiagnostic', 'LDAP connection', array(
            'module' => 'LdapConnection',
            'action' => 'index'
        ), Piwik::hasUserSuperUserAccess(), $order = 10);
    }
}
