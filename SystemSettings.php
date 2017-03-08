<?php
namespace Piwik\Plugins\LdapConnection;

use Piwik\Settings\FieldConfig;
use Piwik\Settings\Setting;

class SystemSettings extends \Piwik\Settings\Plugin\SystemSettings
{

    /**
     *
     * @var Setting
     */
    public $host;

    /**
     *
     * @var Setting
     */
    public $port;

    /**
     *
     * @var Setting
     */
    public $baseDn;

    /**
     *
     * @var Setting
     */
    public $username;

    /**
     *
     * @var Setting
     */
    public $password;

    /**
     *
     * @var Setting
     */
    public $bindRequiresDn;

    /**
     *
     * @var Setting
     */
    public $useSsl;

    /**
     *
     * @var Setting
     */
    public $useStartTls;

    /**
     *
     * @var Setting
     */
    public $accountCanonicalForm;

    /**
     *
     * @var Setting
     */
    public $accountDomainName;

    /**
     *
     * @var Setting
     */
    public $accountDomainNameShort;

    /**
     *
     * @var Setting
     */
    public $accountFilterFormat;

    /**
     *
     * @var Setting
     */
    public $allowEmptyPassword;

    /**
     *
     * @var Setting
     */
    public $optReferrals;

    /**
     *
     * @var Setting
     */
    public $tryUsernameSplit;

    /**
     *
     * @var Setting
     */
    public $networkTimeout;

    protected function init()
    {
        $this->host = $this->makeSetting('host', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Server host';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'Only DNS or IP without ldap:// or ldaps:// (e.g. example.com)';
        });
        
        $this->port = $this->makeSetting('port', null, FieldConfig::TYPE_INT, function (FieldConfig $field) {
            $field->title = 'Port';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'e.g. 389 = default, 3268 = global catalog';
        });
        
        $this->baseDn = $this->makeSetting('baseDn', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Base DN';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'e.g. DC=example,DC=com';
        });
        
        $this->username = $this->makeSetting('username', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Bind username';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'Username to bind for the connection (read and/or write)';
        });
        
        $this->password = $this->makeSetting('password', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Bind password';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'Password to bind for the connection (read and/or write)';
        });
        
        $this->bindRequiresDn = $this->makeSetting('bindRequiresDn', false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Bind requires DN?';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Is the bind (username/password above) required?';
        });
        
        /*
         * SSL
         */
        $this->useSsl = $this->makeSetting('useSsl', false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Use SSL?';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Use a secure connection over SSL?';
        });
        
        $this->useStartTls = $this->makeSetting('useStartTls', false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Use start TLS?';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
        });
        
        /*
         * string
         */
        $this->accountCanonicalForm = $this->makeSetting('accountCanonicalForm', null, FieldConfig::TYPE_INT, function (FieldConfig $field) {
            $field->title = 'accountCanonicalForm';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = '1 = DN, 2 = username, 3 = backslash, 4 = principal';
        });
        
        $this->accountDomainName = $this->makeSetting('accountDomainName', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'accountDomainName';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = '.g. example.com';
        });
        
        $this->accountDomainNameShort = $this->makeSetting('accountDomainNameShort', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'accountDomainNameShort';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'e.g. EXAMPLE';
        });
        
        $this->accountFilterFormat = $this->makeSetting('accountFilterFormat', null, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'accountFilterFormat';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'e.g. (&(objectclass=user)(samAccountName=%s))';
        });
        
        /*
         * Bool
         */
        $this->allowEmptyPassword = $this->makeSetting('allowEmptyPassword', false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'allowEmptyPassword';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Use a secure connection over SSL?';
        });
        
        $this->optReferrals = $this->makeSetting('optReferrals', false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'optReferrals';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
        });
        $this->tryUsernameSplit = $this->makeSetting('tryUsernameSplit', true, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Try username split?';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
        });
        
        /*
         * int
         */
        $this->networkTimeout = $this->makeSetting('networkTimeout', null, FieldConfig::TYPE_INT, function (FieldConfig $field) {
            $field->title = 'Network timeout';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->description = 'Empty or 0 for default value. In seconds';
        });
    }
}
