<?php

namespace App\Console\Commands;

use App\Models\Drawing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanDrawingsStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:drawings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean drawings storage, removing images which do not belong to a drawing';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (config('app.env') === 'local') {
            $choice = $this->choice('Are you sure you want to run this locally?', ['Yes', 'No']);

            if ($choice === 'No') {
                $this->info("Aborting command");

                return;
            }
        }

        $images = Storage::allFiles('files');

        foreach ($images as $image) {
            $exists = Drawing::where('file_path', $image)->exists();

            if (!$exists) {
                $this->info("Deleting $image");

                Storage::delete($image);
            } else {
                $this->info("Drawing exists, skipping $image");
            }
        }

        return Command::SUCCESS;
    }
}
