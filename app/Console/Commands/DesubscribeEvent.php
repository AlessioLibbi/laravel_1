<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\User;
use App\Mail\EmailFranz;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DesubscribeEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:desubscribe-event  {event_id} {user_id?} {--all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'unsign all subscriber from an event';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $this->info('Command Started!!!');
        $all = $this->option('all');
        
        if($all) {
            $event = Event::find($this->argument('event_id'));
            $event->subscribers()->detach();
            $this->info("All users subscribed at the {$event->name} are deleted!!!");

        } else {
            $event = Event::find($this->argument('event_id'));
            $event->subscribers()->detach($this->argument('user_id'));
            $this->info("The subscriber are deleted from {$event->name}");
        }
       

    }
}
