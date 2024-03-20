<?php
namespace App\Repositories;
use App\Models\Resources;
class ResourceRepository extends Repository {
    public function __construct() {
        parent::__construct(new Resources());
    }
}