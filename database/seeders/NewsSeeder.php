<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title' => 'Major Data Breach at Tech Company Exposes Millions',
            'description' => 'A leading tech company recently experienced a major data breach, exposing personal information of millions of users. The breach was discovered by the company’s security team last week and has since been contained.',
            'image' => 'images/data-breach.jpg',
            'published_at' => now(),
            'slug' => 'major-data-breach-tech-company-exposes-millions'
        ]);

        News::create([
            'title' => 'Ransomware Attack Hits Global Manufacturer',
            'description' => 'A global manufacturing firm has been hit by a ransomware attack, causing significant disruptions to its operations. The attackers have demanded a multi-million dollar ransom to unlock the company’s systems.',
            'image' => 'images/ransomware-attack.jpg',
            'published_at' => now(),
            'slug' => 'ransomware-attack-global-manufacturer'
        ]);

        News::create([
            'title' => 'New Cybersecurity Legislation Proposed in the US',
            'description' => 'A new bill aimed at strengthening cybersecurity measures across various industries has been proposed in the US Senate. The legislation focuses on enhancing defenses against cyber attacks and improving response strategies.',
            'image' => 'images/cybersecurity-legislation.jpg',
            'published_at' => now(),
            'slug' => 'new-cybersecurity-legislation-proposed-us'
        ]);

        News::create([
            'title' => 'Phishing Scams on the Rise During Holiday Season',
            'description' => 'Cybersecurity experts have warned about an increase in phishing scams during the holiday season. Consumers are advised to be cautious when receiving unsolicited emails and to avoid clicking on suspicious links.',
            'image' => 'images/phishing-scams.png',
            'published_at' => now(),
            'slug' => 'phishing-scams-rise-holiday-season'
        ]);
    }
}
