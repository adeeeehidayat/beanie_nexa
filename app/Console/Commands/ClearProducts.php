<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearProducts extends Command
{
    protected $signature = 'products:clear';
    protected $description = 'Hapus semua data di tabel products sebelum seeding';

    public function handle()
    {
        DB::table('products')->delete(); // Hapus semua data tanpa truncate

        // Reset ID auto-increment (khusus PostgreSQL)
        DB::statement("ALTER SEQUENCE products_id_seq RESTART WITH 1");

        $this->info('Semua data produk telah dihapus dan ID di-reset!');
    }
}
