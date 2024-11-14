<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Models\Note;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Console\Command;

class SendScheduledNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-scheduled-notes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // TODO: Normalize all dates to UTC datetimes.
        $today = Carbon::today("America/Los_Angeles");
        $this->info($today->toDateTimeString());

        $notes = Note::where('is_published', true)
            ->where('send_date', $today->toDateTimeString())
            ->get();

        $noteCount = $notes->count();
        $this->info("Sending {$noteCount} scheduled notes.");

        foreach ($notes as $note) {
            SendEmail::dispatch($note);
        }
    }
}
