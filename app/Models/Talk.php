<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $fillable = [ 'name', 'desc', 'designation', 'category', 'level', 'start_time', 'end_time', 'day' ];

    protected $categories = [
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

    public function speaker()
    {
        return $this->belongsTo('App\Models\Speaker');
    }

    public function getCategory()
    {
        return $this->categories[$this->category];
    }
}
