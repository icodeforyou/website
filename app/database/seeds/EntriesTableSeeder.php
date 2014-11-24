<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class EntriesTableSeeder extends Seeder {

	public function run()
	{
		
        $intressenter = [
            [
                "name"    => "Fam. Thorstedt",
                "email"   => "johan@thorstedt.se",
                "address" => "Oktorp 107, 311 67 Slöinge",
                "lat"     => "56.86194039999999",
                "lon"     => "12.690483099999938"
            ],
            [
                "name"    => "Fam. Albrektsson",
                "email"   => "anette.albrektsson@telia.com",
                "address" => "Trastgatan 3, 311 68 Slöinge",
                "lat"     => "56.8544922",
                "lon"     => "12.697200800000019"
            ],
            [
                "name"    => "Fam. Sönnerstedt",
                "email"   => "johan@sonnerstedt.net",
                "address" => "Almgatan 6, 311 68 Slöinge",
                "lat"     => "56.85476809999999",
                "lon"     => "12.684673599999996"
            ],
            [
                "name"    => "Dennis Johansson",
                "email"   => "dempa74@icloud.com",
                "address" => "Trastgatan 2a, 311 68 Slöinge",
                "lat"     => "56.8545785",
                "lon"     => "12.697939700000006"
            ],
            [
                "name"    => "Anne-Sofie Yngerlöv",
                "name2"   => "Mårten Reisne",
                "email"   => "a_yngerlov@hotmail.com",
                "address" => "Stationsgatan 9, 311 68 Slöinge",
                "lat"     => "56.8523211",
                "lon"     => "12.691060099999959"
            ],
            [
                "name"    => "Christer Jörmalm",
                "email"   => "cjormalm@gmail.com",
                "address" => "Trädgårdsgatan 5, 311 68 Slöinge",
                "lat"     => "56.8533416",
                "lon"     => "12.688297299999931"
            ],
            [
                "name"    => "Peter Persson",
                "email"   => "petepers@bredband.net",
                "address" => "Bertevägen 7, 311 67 Slöinge",
                "lat"     => "56.8517975",
                "lon"     => "12.688224799999944"
            ],
            [
                "name"    => "Niclas Johansson",
                "email"   => "krabbfiskaren@hotmail.com",
                "address" => "Ågatan 3, 311 68 Slöinge",
                "lat"     => "56.8511417",
                "lon"     => "12.689538399999947"
            ],
            [
                "name"    => "Fredrik Norén",
                "email"   => "vallagurun@telia.com",
                "address" => "Rosgatan 4, 311 67 Slöinge",
                "lat"     => "56.8543351",
                "lon"     => "12.690507900000057"
            ],
            [
                "name"    => "Thorvald Persson",
                "name2"   => "Ingrid Persson",
                "email"   => "thorvald.persson@telia.com",
                "address" => "Yttregårdsvägen 8, 311 06 Heberg",
                "lat"     => "56.8840717",
                "lon"     => "12.632103700000016"
            ],
            [
                "name"    => "Patric Brundin",
                "name2"   => "Anneli Brundin",
                "email"   => "40208@telia.com",
                "address" => "Bäckagårdsvägen 6, 311 68 Slöinge",
                "lat"     => "56.855353",
                "lon"     => "12.698239300000068"
            ],
            [
                "name"    => "Stig Svensson",
                "email"   => "5716svensson@telia.com",
                "address" => "Stenlösvägen 6, 311 68 Slöinge",
                "lat"     => "56.8519696",
                "lon"     => "12.6842586"
            ]
        ];

		foreach($intressenter as $index)
		{

            $addressParts = explode(",", $index["address"]);
        
            $zip = substr(trim($addressParts[1]), 0, 6);
            
			Entry::create([
                "name" => $index["name"],
                "name2" => isset($index["name2"]) ? $index["name2"] : "",
                "postalCode" => preg_replace('/\s/', "", $zip),
                "email" => $index["email"],
                "address" => $index["address"],
                "lat" => $index["lat"],
                "lon" => $index["lon"]
			]);
		}
	}

}