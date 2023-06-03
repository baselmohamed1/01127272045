<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('addon.single_content_price', 1);
        $this->migrator->add('addon.single_server_price', 1);
    }
};
