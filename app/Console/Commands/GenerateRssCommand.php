<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\GlobalHelper as G;


class GenerateRssCommand extends Command {

    /**
     *  The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:rss';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate RSS";

    private $output_dir = "public/sitemap";
    private $base_url = "https://rima.rfnaj.id";

    private $last_mod;

    private $sitemap_index = "sitemap-index.xml";
    private $sitemap_manual = "sitemap-manual.xml.gz";
    private $sitemap_rima = "sitemap-rima.xml.gz";
    private $sitemap_rima_akhir = "sitemap-rima-akhir.xml.gz";
    private $sitemap_rima_akhir_ganda = "sitemap-rima-akhir-ganda.xml.gz";
    private $sitemap_rima_awal = "sitemap-rima-awal.xml.gz";
    private $sitemap_rima_awal_ganda = "sitemap-rima-awal-ganda.xml.gz";
    private $sitemap_rima_konsonan = "sitemap-rima-konsonan.xml.gz";
    private $sitemap_rima_vokal = "sitemap-rima-vokal.xml.gz";

    private $sitemap_manual_urls = [
        "",
        "/docs/index.html"
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        G::log("Initiating Generate RSS");

        $this->last_mod = date('Y-m-d');


        // get kata from database
        $data = $this->getKata();

        // generate sitemap chunks
        $sitemap_chunks_config = [
            ["file" => $this->sitemap_rima, "url" => $this->base_url.'/rima/{param}'],
            ["file" => $this->sitemap_rima_akhir, "url" => $this->base_url.'/rima/{param}/akhir'],
            ["file" => $this->sitemap_rima_akhir_ganda, "url" => $this->base_url.'/rima/{param}/akhir-ganda'],
            ["file" => $this->sitemap_rima_awal, "url" => $this->base_url.'/rima/{param}/awal'],
            ["file" => $this->sitemap_rima_awal_ganda, "url" => $this->base_url.'/rima/{param}/awal-ganda'],
            ["file" => $this->sitemap_rima_konsonan, "url" => $this->base_url.'/rima/{param}/konsonan'],
            ["file" => $this->sitemap_rima_vokal, "url" => $this->base_url.'/rima/{param}/vokal']
        ];
        foreach ($sitemap_chunks_config as $config) {
            $this->generateSitemapChunk($config['file'], $config['url'] , $data);
        }

        // generate sitemap manual
        $sitemap_manual_config = [["file" => $this->sitemap_manual]];
        $this->generateSitemapManual();

        // generate sitemap index
        $this->generateSitemapIndex(array_merge(
            $sitemap_manual_config,
            $sitemap_chunks_config
        ));
    }

    private function generateSitemapIndex($config){
        G::log('Generating '. $this->sitemap_index);

        $base_sitemap_url = $this->base_url . "/sitemap";
        $index_file = $this->output_dir."/".$this->sitemap_index;

        if(($output = fopen($index_file,"wb")) !== FALSE){
            $content = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
            $content .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            foreach ($config as $item) {
                $file = $item["file"];
                $content.="\n\t<sitemap>";
                $content.="\n\t\t<loc>".$base_sitemap_url."/$file</loc>";
                $content.="\n\t</sitemap>";
            }

            $content .= "\n</sitemapindex>";

            fputs($output, $content);
            fclose($output);
        } else {
            G::log('Failed creating '.$this->sitemap_index);
        }
    }

    private function generateSitemapManual(){
        $filename = $this->sitemap_manual;
        G::log("Generating $filename");
        $index_file = $this->output_dir."/$filename";

        if(($output = fopen($index_file,"wb")) !== FALSE){
            $content = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
            $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            foreach ($this->sitemap_manual_urls as $item) {

                $url = $this->base_url.$item;

                $content.="\n\t<url>";
                $content.="\n\t\t<loc>".$url."</loc>";
                $content.="\n\t\t<lastmod>".$this->last_mod."</lastmod>";
                $content.="\n\t</url>";
            }

            $content .= "\n</urlset>";

            fputs($output, $content);
            fclose($output);
        } else {
            G::log('Failed creating $filename');
        }
    }

    private function generateSitemapChunk($filename,$url,$data){
        G::log("Generating $filename");
        $index_file = $this->output_dir."/$filename";

        if(($output = fopen($index_file,"wb")) !== FALSE){
            $content = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
            $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            foreach ($data as $item) {

                $item->url = str_replace('{param}', $item->kata, $url);

                $content.="\n\t<url>";
                $content.="\n\t\t<loc>".$item->url."</loc>";
                $content.="\n\t\t<lastmod>".$this->last_mod."</lastmod>";
                $content.="\n\t</url>";
            }

            $content .= "\n</urlset>";

            fputs($output, $content);
            fclose($output);
        } else {
            G::log('Failed creating $filename');
        }
    }

    private function getKata(){
        $data = DB::table('kamus')->select('kata')->distinct()->get();
        G::log("Data count : ". count($data));
        return $data;
    }

}
