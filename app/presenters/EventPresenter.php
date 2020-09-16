<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\ImageModel;

final class EventPresenter extends BasePresenter
{

    /** @var ImageModel @inject */
    public $images;


    public function renderDefault(): void
    {
        $this->template->events = $this->repository->event->getPublicEvents();
    }

    public function renderShow($slug): void
    {
        $this->template->event = $this->repository->event->getEvent($slug);

        if ($this->template->event->gallery_id != NULL)
            $this->template->images = $this->repository->image->getImagesByGallery($this->template->event->gallery_id);
    }
}
