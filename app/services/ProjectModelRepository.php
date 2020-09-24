<?php

namespace App\Service;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

/**
 * @property-read \App\Model\EventModel $event
 * @property-read \App\Model\ParticipantModel $participant
 * @property-read \App\Model\ServiceModel $service
 * @property-read \App\Model\NewModel $new
 * @property-read \App\Model\GalleryModel $gallery
 * @property-read \App\Model\ImageModel $image
 */
class ProjectModelRepository extends ModelRepository
{

    public function getPublicNews(string $lang, int $limit, int $offset): Selection
    {
        return $this->new->getTable()->where('public', 1)->where('lang', $lang)->order('created DESC')->limit($limit, $offset);
    }

    public function getPublicNewsCount(string $lang): int
    {
        return $this->new->getTable()->where('public', 1)->where('lang', $lang)->order('created DESC')->count();
    }

    public function getServicesForSelect(): array
    {
        return $this->service->getTable()->fetchPairs('id', 'name');
    }

    public function getEventParticipantsCount(int $id): int
    {
        return $this->participant->getTable()->where('id', $id)->count();
    }

    public function getParticipant(int $id): ActiveRow
    {
        return $this->participant->getTable()->where('id', $id)->fetch();
    }
}
