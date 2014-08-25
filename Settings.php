<?php
namespace Piwik\Plugins\LdapConnection;

use Piwik\Settings\SystemSetting;

class Settings extends \Piwik\Plugin\Settings
{

    protected function init()
    {
        $this->setIntroduction('See general help for options here: http://framework.zend.com/manual/2.3/en/modules/zend.ldap.introduction.html#theory-of-operation');
        
        $setting = new SystemSetting('host', 'Server host');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'Only DNS or IP without ldap:// or ldaps:// (e.g. example.com)';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('port', 'Port');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'e.g. 389 = default, 3268 = global catalog';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('baseDn', 'Base DN');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'e.g. DC=example,DC=com';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('username', 'Bind username');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'Username to bind for the connection (read and/or write)';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('password', 'Bind password');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'Password to bind for the connection (read and/or write)';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('bindRequiresDn', 'Bind requires DN?');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_BOOL;
        $setting->defaultValue = false;
        $setting->inlineHelp = 'Is the bind (username/password above) required?';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('useSsl', 'Use SSL?');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_BOOL;
        $setting->defaultValue = false;
        $setting->inlineHelp = 'Use a secure connection over SSL?';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('useStartTls', 'Use start TLS?');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_BOOL;
        $setting->defaultValue = false;
        $this->addSetting($setting);
        
        $setting = new SystemSetting('accountCanonicalForm', 'accountCanonicalForm');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_INT;
        $setting->defaultValue = null;
        $setting->inlineHelp = '1 = DN, 2 = username, 3 = backslash, 4 = principal';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('accountDomainName', 'accountDomainName');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'e.g. example.com';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('accountDomainNameShort', 'accountDomainNameShort');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'e.g. EXAMPLE';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('accountFilterFormat', 'accountFilterFormat');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_STRING;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'e.g. (&(objectclass=user)(samAccountName=%s))';
        $this->addSetting($setting);
        
        $setting = new SystemSetting('allowEmptyPassword', 'allowEmptyPassword');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_BOOL;
        $setting->defaultValue = false;
        $this->addSetting($setting);
        
        $setting = new SystemSetting('optReferrals', 'optReferrals');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_BOOL;
        $setting->defaultValue = false;
        $this->addSetting($setting);
        
        $setting = new SystemSetting('tryUsernameSplit', 'Try username split?');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_BOOL;
        $setting->defaultValue = true;
        $this->addSetting($setting);
        
        $setting = new SystemSetting('networkTimeout', 'Network timeout');
        $setting->readableByCurrentUser = true;
        $setting->type = self::TYPE_INT;
        $setting->defaultValue = null;
        $setting->inlineHelp = 'Empty or 0 for default value. In seconds';
        $this->addSetting($setting);
    }
}
