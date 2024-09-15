<?php

namespace App\Console\Commands;

use App\Models\Advice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-data {start} {end}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration file into a new database schema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startId = $this->argument('start');
        $endId = $this->argument('end');

        $this->info('Migration started...');

        $previousAdvices = DB::connection('previous_mysql')->table('advice')
            ->where('id', '>=', $startId)
            ->where('id', '<=', $endId)
            ->cursor();

        DB::transaction(function () use ($previousAdvices) {
            foreach ($previousAdvices as $previousAdvice) {
                $advice = Advice::create([
                    'prev_migrate_id' => $previousAdvice->id,
                ]);

                $advice->translateOrNew('en')->name = $previousAdvice->name;
                $advice->translateOrNew('id')->name = $previousAdvice->name_id;
                $advice->translateOrNew('en')->information = $previousAdvice->information;
                $advice->translateOrNew('id')->information = $previousAdvice->information_id;
                $advice->translateOrNew('en')->actual_tip = $previousAdvice->actual_tip;
                $advice->translateOrNew('id')->actual_tip = $previousAdvice->actual_tip_id;
                $advice->translateOrNew('en')->tip_example = $previousAdvice->tip_example;
                $advice->translateOrNew('id')->tip_example = $previousAdvice->tip_example_id;
                $advice->save();

                $this->line(sprintf('Advice %d migrated', $previousAdvice->id));
            }
        });

        $this->info('The command was successful!');
    }
}
