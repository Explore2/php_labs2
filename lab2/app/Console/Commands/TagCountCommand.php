<?php

namespace App\Console\Commands;

use App\Models\ArticleTag;
use Illuminate\Console\Command;

class TagCountCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns count of articles that use tag with {id}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info(ArticleTag::query()->where('tag_id', $this->argument('id'))->count());
        return 0;
    }
}
