<?php

namespace App\Model;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

class ParticipantModel extends BaseModel
{

    protected $table = 'participants';

    public function getParticipantsForEvent(int $event_id): Selection
    {
        return $this->getTable()->where('event_id', $event_id)->order('id ASC');
    }

    public function getParticipantsForEventCount(int $event_id): int
    {
        return $this->getParticipantsForEvent($event_id)->count();
    }

}
