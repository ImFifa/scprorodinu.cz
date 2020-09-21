<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\FileModel;
use App\Model\FolderModel;
use App\Model\ImageModel;

final class HomepagePresenter extends BasePresenter
{

    /** @var ImageModel @inject */
    public $images;

    /** @var FolderModel @inject */
    public $folders;

    /** @var FileModel @inject */
    public $files;

    public function renderDefault(): void
    {
        $this->template->images = $this->images->getImagesByGallery(1);
        $this->template->headerImages = $this->images->getImagesByGallery(2);
        $this->template->headerImagesCount = count($this->template->headerImages);
    }

    public function renderFosterCare(): void
    {
        $this->template->images = $this->images->getImagesByGallery(3);
    }

    public function renderWithoutDebts(): void
    {
        $this->template->images = $this->images->getImagesByGallery(4);
    }

    public function renderSponsors(): void
    {
        $this->template->images = $this->images->getImagesByGallery(5);
    }

    public function renderDocuments(): void
    {
        $this->template->allFiles = $this->files->getAllFiles();
        $this->template->allFolders = $this->folders->getAllFolders();
    }

    public function renderContact(): void
    {

    }
}