<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;

class UpdateProductActiveStatus extends Command
{
    /**
     * The name and signature of the console command.
     * Gõ lệnh này trong terminal để chạy command.
     *
     * Ví dụ: php artisan products:update-active-status
     */
    protected $signature = 'products:update-active-status';

    /**
     * The console command description.
     */
    protected $description = 'Cập nhật lại trạng thái active của sản phẩm dựa vào start_date và end_date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // \Log::info("Cron chạy lúc: " . now());

        $today = Carbon::today();

        // Set active = 0 nếu ngoài khoảng start_date - end_date
        $count = Product::where(function ($query) use ($today) {
                $query->whereDate('start_date', '>', $today)
                      ->orWhereDate('end_date', '<', $today);
            })
            ->where('active', 1)
            ->update(['active' => 0]);

        $this->info("Đã cập nhật $count sản phẩm thành inactive.");

        // \Log::info("Đã cập nhật $count sản phẩm.");
    }
}
