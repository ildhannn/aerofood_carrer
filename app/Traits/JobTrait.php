<?php 

namespace App\Traits;

use App\Models\Job;

trait JobTrait {
    public function getDraft() {
        return Job::whereStatus(0);
    }

    public function getPublished() {
        return Job::whereStatus(1);
    }

    public function getClosed() {
        return Job::whereStatus(2);
    }
}