<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use Spatie\Sitemap\SitemapGenerator;
use Psr\Http\Message\UriInterface;

class  SitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate A Laravel Sitemap Dynamically ';

    /**
     * Execute the console command.
     *
     * @return int
     */


    public function handle()
    {

       SitemapGenerator::create('https://www.mercemur.com')
        ->hasCrawled(function (Url $url) {
            if (!(is_null($url->segment(1)))) {
                $url->setPriority(0.4)
                    ->setChangeFrequency('yearly')
                      ->setLastModificationDate(Carbon::now('Asia/Kolkata'));
            }

            if (is_null($url->segment(1))) {
                $url->setPriority(1)
                    ->setChangeFrequency('daily')
                    ->setLastModificationDate(Carbon::now('Asia/Kolkata'));
            }


            if ( $url->segment(1) === 'about-us') {
                $url->setPriority(0.6)
                   ->setChangeFrequency('monthly');

            }

              if ($url->segment(1) === 'pricing' || $url->segment(1) === 'features' || $url->segment(1) === 'comparing-page') {
                $url->setPriority(0.8)
                    ->setChangeFrequency('daily');

            }
               if ( $url->segment(1) === 'contact-us') {
                $url->setPriority(0.4)
                   ->setChangeFrequency('never');

            }

             if ( $url->segment(1) === 'faq') {
                $url->setPriority(0.4)
                   ->setChangeFrequency('monthly');

            }





       return $url;
   })
   ->writeToFile(public_path('sitemap.xml'));


        return 0;
    }
}
