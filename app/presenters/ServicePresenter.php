<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\ImageModel;

final class ServicePresenter extends BasePresenter
{

    /** @var ImageModel @inject */
    public $images;


    public function renderDefault(): void
    {
        $this->template->services = $this->repository->service->getPublicServices();
    }

    public function renderShow($slug): void
    {
        $this->template->service = $this->repository->service->getService($slug);

        if ($this->template->service->gallery_id != NULL)
            $this->template->images = $this->repository->image->getImagesByGallery($this->template->service->gallery_id);
    }
}
