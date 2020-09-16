<?php

namespace App\Service;

use Nette\Database\Table\Selection;

/**
 * @property-read \App\Model\EventModel $event
 * @property-read \App\Model\ServiceModel $service
 * @property-read \App\Model\NewModel $new
 * @property-read \App\Model\GalleryModel $gallery
 * @property-read \App\Model\ImageModel $image
 */
class ProjectModelRepository extends ModelRepository
{

    public function findPublicNews(int $limit, int $offset): Selection
    {
        return $this->new->getTable()->where('public', 1)->order('id DESC')->limit($limit, $offset);
    }

    public function getPublicNewsCount(): int
    {
        return $this->new->getTable()->where('public', 1)->count();
    }

    public function getServicesForSelect(): array
    {
        return $this->service->getTable()->fetchPairs('id', 'name');

    }
}
