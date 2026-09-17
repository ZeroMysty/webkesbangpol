<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanAlamatTables extends Command
{
    protected $signature   = 'ormas:clean-alamat';
    protected $description = 'Strip <table> HTML tags from all ormas.alamat values';

    public function handle(): int
    {
        $rows = DB::table('ormas')->get(['id', 'alamat']);
        $fixed = 0;

        foreach ($rows as $row) {
            $clean = preg_replace(
                '/<\/?(?:table|tbody|thead|tfoot|tr|th|td)\b[^>]*>/i',
                '',
                (string) $row->alamat
            );

            if ($clean !== (string) $row->alamat) {
                DB::table('ormas')->where('id', $row->id)->update(['alamat' => $clean]);
                $this->info("Fixed ID {$row->id}");
                $fixed++;
            } else {
                $this->line("OK    ID {$row->id}");
            }
        }

        $this->info("Done! {$fixed} row(s) cleaned.");
        return Command::SUCCESS;
    }
}
