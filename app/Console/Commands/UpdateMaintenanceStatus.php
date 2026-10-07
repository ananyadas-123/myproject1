<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Maintenance;

class UpdateMaintenanceStatus extends Command
{
    protected $signature = 'maintenance:update-status';

    protected $description = 'Update maintenance records that are overdue';

    public function handle()
    {
        $updated = Maintenance::where('status', 'scheduled')
            ->whereDate('next_service_date', '<', now()->toDateString())
            ->update([
                'status' => 'overdue',
            ]);

        $this->info("Maintenance statuses updated: {$updated}");

        return Command::SUCCESS;
    }
}