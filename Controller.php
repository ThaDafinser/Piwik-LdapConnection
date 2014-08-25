<?php
/**
 * @author https://github.com/ThaDafinser
 */
namespace Piwik\Plugins\LdapConnection;

use Piwik\Piwik;
use Piwik\View;
use Exception;

/**
 */
class Controller extends \Piwik\Plugin\ControllerAdmin
{

    function index()
    {
        Piwik::checkUserHasSuperUserAccess();
        
        $ldap = API::getInstance()->getConnection();
        
        $exception = null;
        
        $connSucc = false;
        try {
            $ldap->connect();
            $connSucc = true;
        } catch (Exception $e) {
            $exception = $e;
        }
        
        $boundUser = $ldap->getBoundUser();
        $bindSucc = false;
        try {
            $ldap->bind();
            $boundUser = $ldap->getBoundUser();
            
            $bindSucc = true;
        } catch (Exception $e) {
            $exception = $e;
        }
        
        if(is_bool($boundUser)){
            $boundUser = 'No user (failure)';
        } elseif ($boundUser === null){
            $boundUser = 'Anonymous';
        }
        
        $view = new View('@LdapConnection/index');
        $this->setBasicVariablesView($view);
        $view->connectionSuccess = $connSucc;
        $view->bindSuccess = $bindSucc;
        $view->boundUser = $boundUser;
        $view->exception = $exception;
        $view->options = $ldap->getOptions();
        
        return $view->render();
    }
}
