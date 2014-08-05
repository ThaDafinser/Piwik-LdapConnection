<?php
/**
 * @author https://github.com/ThaDafinser
 */
namespace Piwik\Plugins\LdapConnection;

use Exception;
use Piwik\Piwik;
use Zend\Ldap\Ldap;

class API extends \Piwik\Plugin\API
{

    /**
     *
     * @var Ldap
     */
    protected $ldap;

    /**
     * For IDE and codecompletion
     *
     * @return API
     */
    public static function getInstance()
    {
        return parent::getInstance();
    }

    /**
     *
     * @return Ldap
     */
    public function getConnection()
    {
        if ($this->ldap === null) {
            require __DIR__ . '/vendor/autoload.php';
            
            $settings = new Settings('LdapConnection');
            $settings = $settings->getSettings();
            
            $settingValues = [];
            foreach ($settings as $key => $setting) {
                $value = $setting->getValue();
                if ($value == '') {
                    $value = null;
                }
                
                $settingValues[$key] = $value;
            }
            
            $ldap = new Ldap($settingValues);
            
            $this->ldap = $ldap;
        }
        
        return $this->ldap;
    }
}
