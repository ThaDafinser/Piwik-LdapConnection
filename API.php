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
            
            $settings = new SystemSettings();
           
            
            $settingValues = [
                'host' =>  $settings->host->getValue(),
                'port' =>  $settings->port->getValue(),
                
                'baseDn' =>  $settings->baseDn->getValue(),
                'username' =>  $settings->username->getValue(),
                'password' =>  $settings->password->getValue(),
                
                'bindRequiresDn' =>  $settings->bindRequiresDn->getValue(),
                'useSsl' =>  $settings->useSsl->getValue(),
                'useStartTls' =>  $settings->useStartTls->getValue(),
                'accountCanonicalForm' =>  $settings->accountCanonicalForm->getValue(),
                'accountDomainName' =>  $settings->accountDomainName->getValue(),
                'accountDomainNameShort' =>  $settings->accountDomainNameShort->getValue(),
                'accountFilterFormat' =>  $settings->accountFilterFormat->getValue(),
                'allowEmptyPassword' =>  $settings->allowEmptyPassword->getValue(),
                'optReferrals' =>  $settings->optReferrals->getValue(),
                'tryUsernameSplit' =>  $settings->tryUsernameSplit->getValue(),
                'networkTimeout' =>  $settings->networkTimeout->getValue(),
            ];
            
            $ldap = new Ldap($settingValues);
            
            $this->ldap = $ldap;
        }
        
        return $this->ldap;
    }
}
