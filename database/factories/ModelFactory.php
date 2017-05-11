<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

function getRandomImage()
{
    return 'pic0'.rand(1,7).'.jpg';
}

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Speaker::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'image' => 'images/speakers/'.getRandomImage(),
        'desc' => $faker->paragraph
    ];
});

$factory->define(App\Models\Talk::class, function (Faker\Generator $faker) {
    $categories = [
        "apis" => "Building & Consuming APIs",
        "cloud" => "Cloud & Scalability",
        "cms" => "CMSs & PHP Platforms",
        "databases" => "Databases & NoSQL",
        "dev" => "Development",
        "devops" => "DevOps & Administration",
        "frameworks" => "Frameworks & Libraries",
        "frontend" => "Frontend",
        "hack_hhvm" => "Hack/HHVM",
        "javascript" => "JavaScript",
        "soft_skills" => "Leadership & Soft Skills",
        "community" => "OSS & Community",
        "other" => "Other",
        "internals" => "PHP Internals",
        "practices" => "Programming Practices",
        "projmgmt" => "Project Management",
        "security" => "Security & Auditing",
        "testing" => "Testing & Automation",
        "design" => "Usability & Design",
    ];
    $levels = [
        'beginner' => 'Beginner',
        'intermediate' => 'Intermediate',
        'advanced' => 'Advanced'
    ];
    $pick = rand(1,10);
    if ($pick < 3) {
        $designation = 'workshop';
    } elseif ($pick < 4) {
        $designation = 'keynote';
    } else {
        $designation = 'talk';
    }
    $category = array_rand($categories);
    $level = array_rand($levels);
    return [
        'name' => title_case($faker->sentence),
        'desc' => $faker->paragraph,
        'designation' => $designation,
        'category' => $category,
        'level' => $level
    ];
});

$factory->define(App\Models\Event::class, function (Faker\Generator $faker) {
    return [
        'name' => title_case($faker->sentence),
        'desc' => $faker->paragraph,
        'location' => $faker->address
    ];
});

$factory->define(App\Models\Sponsor::class, function (Faker\Generator $faker) {
    $level = [
        'platinum' => 'Platinum',
        'gold' => 'Gold',
        'silver' => 'Silver',
        'bronze' => 'Bronze',
        'community' => 'Community'
    ];
    $level = array_rand($level);
    return [
        'name' => $faker->company,
        'contact' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'image' => 'images/sponsors/'.getRandomImage(),
        'desc' => $faker->paragraph,
        'level' => $level,
        'active' => rand(0,1)
    ];
});
