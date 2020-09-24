<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\ImageModel;
use App\Model\NewModel;
use Nette\Utils\Paginator;

final class NewPresenter extends BasePresenter
{

    /** @var ImageModel @inject */
    public $images;

    /** @var NewModel @inject */
    public $news;

    public function renderDefault(int $page = 1): void
    {
        $newsCount = $this->repository->getPublicNewsCount('cs');

        $paginator = new Paginator;
        $paginator->setPage($page); // číslo aktuální stránky
        $paginator->setItemsPerPage(5); // počet položek na stránce
        $paginator->setItemCount($newsCount); // celkový počet položek, je-li znám


        $this->template->news = $this->repository->getPublicNews('cs', $paginator->getLength(), $paginator->getOffset());
        $this->template->paginator = $paginator;
    }

    public function renderShow($slug): void
    {
        $this->template->new = $this->repository->new->getNew($slug, 'cs');

        if ($this->template->new === NULL) {
            $this->error();
        }

        if ($this->template->new->gallery_id != NULL)
            $this->template->images = $this->repository->image->getImagesByGallery($this->template->new->gallery_id);
    }

}
