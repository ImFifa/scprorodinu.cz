<?php

namespace App\Model;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

class ServiceModel extends BaseModel
{

    protected $table = 'service';

    public function getService($slug): ?ActiveRow
    {
        return $this->getTable()->where('public', 1)->where('slug', $slug)->fetch();
    }

    public function getPublicServices(): Selection
    {
        return $this->getTable()->where('public', 1)->order('id DESC');
    }

}
