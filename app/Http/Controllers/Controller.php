<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $availableLevels = [
        'platinum' => 'Platinum',
        'gold' => 'Gold',
        'silver' => 'Silver',
        'bronze' => 'Bronze',
        'copper' => 'Copper',
        'community' => 'Community'
    ];

    public $talkCategories = [
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

    public $talkLevels = [
        'beginner' => 'Beginner',
        'intermediate' => 'Intermediate',
        'advanced' => 'Advanced'
    ];

    public $days = [
        'Wednesday', 'Thursday Room 111', 'Thursday Room 178', 'Friday', 'Saturday', 'Sunday'
    ];

    public $designations = [
        'workshop' => 'Workshop',
        'keynote' => 'Keynote',
        'talk' => 'Talk',
        'panel' => 'Panel'
    ];

    public function __construct()
    {
        // info for footer
        $sponsors = Sponsor::inRandomOrder()->where('active', true)->get();
        $split = $sponsors->split(3);
        $sponsors = $split->toArray();
        for ($i = 0; $i < 3; $i++) {
            if (!array_key_exists($i, $sponsors)) {
                $sponsors[$i] = [];
            }
        }
        if (empty($sponsors)) {
            $sponsors = [
                0 => [],
                1 => [],
                2 => []
            ];
        }
        \View::share([
            'sponsorColumn1'=>$sponsors[0],
            'sponsorColumn2'=>$sponsors[1],
            'sponsorColumn3'=>$sponsors[2]
        ]);
    }
}
