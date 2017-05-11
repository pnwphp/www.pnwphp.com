<?php

namespace App\Http\Controllers;

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
        'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
    ];

    public function __construct()
    {

    }
}
