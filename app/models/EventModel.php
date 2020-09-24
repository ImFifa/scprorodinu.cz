<?php

namespace App\Model;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

class EventModel extends BaseModel
{

    protected $table = 'event';

    public function getEvent($slug): ?ActiveRow
    {
        return $this->getTable()->where('public', 1)->where('slug', $slug)->fetch();
    }

    public function getPublicEvents(): Selection
    {
        return $this->getTable()->where('public', 1)->order('id DESC');
    }

    public function getUpcomingPublicEvents(int $limit, int $offset): Selection
    {
        $date = date("Y-m-d");
        return $this->getTable()->where('public', 1)->where('date >=', $date)->order('date ASC')->limit($limit, $offset);
    }

    public function getUpcomingPublicEventsCount(): int
    {
        $date = date("Y-m-d");
        return $this->getPublicEvents()->where('date >=', $date)->count();
    }

    public function getPublicEventsCount(): int
    {
        return $this->getPublicEvents()->count();
    }
}
