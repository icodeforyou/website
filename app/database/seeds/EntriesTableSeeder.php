<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class EntriesTableSeeder extends Seeder {

	public function run()
	{
		
        $intressenter = [
            [
                "name"    => "Fam. Thorstedt",
                "email"   => "johan@thorstedt.se",
                "address" => "Oktorp 107, 311 67 Slöinge"
            ],
            [
                "name"    => "Fam. Albrektsson",
                "email"   => "anette.albrektsson@telia.com",
                "address" => "Trastgatan 3, 311 68 Slöinge"
            ],
            [
                "name"    => "Fam. Sönnerstedt",
                "email"   => "johan@sonnerstedt.net",
                "address" => "Almgatan 6, 311 68 Slöinge"
            ],
            [
                "name"    => "Dennis Johansson",
                "email"   => "dempa74@icloud.com",
                "address" => "Trastgatan 2a, 311 68 Slöinge"
            ],
            [
                "name"    => "Anne-Sofie Yngerlöv",
                "name2"   => "Mårten Reisne",
                "email"   => "a_yngerlov@hotmail.com",
                "address" => "Stationsgatan 9, 311 68 Slöinge"
            ],
            [
                "name"    => "Christer Jörmalm",
                "email"   => "cjormalm@gmail.com",
                "address" => "Trädgårdsgatan 5, 311 68 Slöinge"
            ],
            [
                "name"    => "Peter Persson",
                "email"   => "petepers@bredband.net",
                "address" => "Bertevägen 7, 311 67 Slöinge"
            ],
            [
                "name"    => "Niclas Johansson",
                "email"   => "krabbfiskaren@hotmail.com",
                "address" => "Ågatan 3, 311 68 Slöinge"
            ],
            [
                "name"    => "Fredrik Norén",
                "email"   => "vallagurun@telia.com",
                "address" => "Rosgatan 4, 311 67 Slöinge"
            ],
            [
                "name"    => "Thorvald Persson",
                "name2"   => "Ingrid Persson",
                "email"   => "thorvald.persson@telia.com",
                "address" => "Yttregårdsvägen 8, 311 06 Heberg"
            ],
            [
                "name"    => "Patric Brundin",
                "name2"   => "Anneli Brundin",
                "email"   => "40208@telia.com",
                "address" => "Bäckagårdsvägen 6, 311 68 Slöinge"
            ],
            [
                "name"    => "Stig Svensson",
                "email"   => "5716svensson@telia.com",
                "address" => "Stenlösvägen 6, 311 68 Slöinge"
            ]
        ];

		foreach($intressenter as $index)
		{

            $addressParts = explode(",", $index["address"]);
        
            $zip = substr(trim($addressParts[1]), 0, 6);
            
            $city = trim(substr(trim($addressParts[1]), 6));

			Entry::create([
                "name" => $index["name"],
                "name2" => isset($index["name2"]) ? $index["name2"] : "",
                "postalCode" => preg_replace('/\s/', "", $zip),
                "city" => $city,
                "email" => $index["email"],
                "address" => trim($addressParts[0])
			]);
		}
	}

}