<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\ImageModel;
use Nette\Application\UI\Form;
use Nette\Utils\Paginator;

final class EventPresenter extends BasePresenter
{

    /** @var ImageModel @inject */
    public $images;

    public function renderDefault(int $page = 1): void
    {
        $eventsCount = $this->repository->event->getUpcomingPublicEventsCount();

        $paginator = new Paginator;
        $paginator->setPage($page); // číslo aktuální stránky
        $paginator->setItemsPerPage(5); // počet položek na stránce
        $paginator->setItemCount($eventsCount); // celkový počet položek, je-li znám


        $this->template->events = $this->repository->event->getUpcomingPublicEvents($paginator->getLength(), $paginator->getOffset());
        $this->template->paginator = $paginator;
    }

    public function renderShow($slug): void
    {
        $this->template->event = $this->repository->event->getEvent($slug);

        if ($this->template->event === NULL) {
            $this->error();
        }

        $this->template->participantCount = $this->repository->participant->getParticipantsForEventCount($this->template->event->id);

        if ($this->template->event->gallery_id != NULL)
            $this->template->images = $this->repository->image->getImagesByGallery($this->template->event->gallery_id);
    }

    protected function createComponentSignUpForm(): Form
    {
        $form = new Form();

        $form->addHidden('id');

        $form->addText('event_id', 'ID události');

        $form->addText('name', 'Jméno')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 60)
            ->setRequired('Musíte uvést Vaše jméno');

        $form->addText('surname', 'Příjmení')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 60)
            ->setRequired('Musíte uvést Vaše příjmení');

        $form->addEmail('email', 'Emailová adresa')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 120)
            ->setRequired('Musíte uvést Vaši emailovou adresu');

        $form->addInvisibleReCaptcha('recaptcha')
            ->setMessage('Jste opravdu člověk?');

        $form->addSubmit('submit', 'Odeslat přihlášku');

        $form->onSubmit[] = function (Form $form) {
            $values = $form->getValues(true);

            if ($values['id'] === '') {
                unset($values['id']);
                $values['id'] = $this->repository->participant->insert($values)->id;
                $this->flashMessage('Přihláška úspěšně odeslána', 'success');
            } else {
                $this->flashMessage('Přihlášku se nepodařilo odeslat', 'danger');
            }

            $this->redirect('this', ['id' => $values['id']]);
        };

        return $form;
    }

}