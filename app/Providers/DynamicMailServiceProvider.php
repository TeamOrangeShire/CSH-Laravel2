<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CshEmailConfig;
use Illuminate\Support\Facades\Config;

class DynamicMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
     //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->configureMail();
    }
    protected function configureMail()
    {
        $adminId = session('admin_id');
        if ($adminId) {
            $credentials = CshEmailConfig::where('user_id', $adminId)->first();
            if ($credentials) {
                $port = is_numeric($credentials->econf_port) ? (int)$credentials->econf_port : null;

                // Update configuration settings
                Config::set('mail.mailers.smtp.host', $credentials->econf_host);
                Config::set('mail.mailers.smtp.port', $port);
                Config::set('mail.mailers.smtp.username', $credentials->econf_username);
                Config::set('mail.mailers.smtp.password', $credentials->econf_password);
                Config::set('mail.mailers.smtp.encryption', $credentials->econf_encryption);
                Config::set('mail.from.address', $credentials->econf_username); 
                Config::set('mail.from.name', config('app.name'));
            }
        }
    }
    
}
