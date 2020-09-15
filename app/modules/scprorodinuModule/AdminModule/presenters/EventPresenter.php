<?php

namespace App\AdminModule\Presenters;

use App\Grid\EventGrid;
use App\Grid\IEventGridFactory;
use DateTime;
use Nette\Application\UI\Form;
use App\Service\Helpers;
use Nette\Database\Table\ActiveRow;
use Nette\Http\FileUpload;
use Nette\Utils\Strings;

class EventPresenter extends BaseScprorodinuPresenter
{

    /** @var IEventGridFactory @inject */
	public $eventGridFactory;

    public function renderEdit(?int $id): void
	{
		$event = $this->repository->event->get($id);


        /** @var Form $form */
        $form = $this['eventForm'];
        $form->setDefaults($event);

		$this->template->event = $event;
	}

	protected function createComponentEventGrid(): EventGrid
	{
		return $this->eventGridFactory->create();
	}

	protected function createComponentEventForm(): Form
	{
		$form = new Form();

        $form->addHidden('id');

        $form->addText('name', 'Název')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 150)
            ->setRequired('Musíte uvést jméno události');

        $form->addText('date', 'Datum')
            ->setDefaultValue((new DateTime())->format('j.n.Y'))
            ->setRequired('Musíte uvést datum událost');

        $form->addUpload('image', 'Nahrát obrázek novinky');

        $form->addCheckbox('public', 'Veřejný článek')
            ->setDefaultValue(true);

        $form->addSelect('gallery_id', 'Připojit galerii')
            ->setPrompt('Žádná')
            ->setItems($this->repository->gallery->getForSelect());

        $form->addTextArea('content', 'Popis', 100, 25)
            ->setHtmlAttribute('class', 'form-wysiwyg');

        $form->addSubmit('save', 'Uložit');

        $form->onSubmit[] = function (Form $form) {
            $values = $form->getValues(true);
            $values['slug'] = Strings::webalize($values['name']);


            /** @var FileUpload $file */
            $file = $values['image'];
            unset($values['image']);

            if ($values['id'] === '') {
                unset($values['id']);
                $values['id'] = $this->repository->event->insert($values)->id;
                $this->flashMessage('Událost přidána', 'success');
            } else {
                $this->repository->event->get($values['id'])->update($values);
                $this->flashMessage('Událost upravena', 'success');
            }

            $this->repository->event->get($values['id'])->update(['slug' => $values['id'] . '-' . $values['slug']]);

            $link = WWW . '/upload/events/' . $values['id'] . '/';

            if (Helpers::isValidImage($file)) {
                $name = 'image.' . Helpers::getFileType($file);

                if (!file_exists($link)) {
                    Helpers::mkdir($link);
                }
                $image = $file->toImage();

                if ($image->getHeight() > 1080 || $image->getWidth() > 1920) {
                    $image->resize(1920, 1080);
                }

                $image->save($link . $name);
                $this->repository->event->getTable()->where('id', $values['id'])->update(['cover' => $name]);

                $this->cropper('upload/events/' . $values['id'] . '/' . $name, $this->configuration->newAspectRatio, $this->link('this', ['id' => $values['id']]));
            }

            $this->redirect('this', ['id' => $values['id']]);
        };

		return $form;
	}

    public function handleDeleteImage($newId): void
    {
        /** @var ActiveRow $image */
        $event = $this->repository->event->get($newId);
        unlink(WWW . '/upload/events/' . $event->id . '/' . $event->cover);
        $event->update(['cover' => null]);
        $this->flashMessage('Náhledový obrázek byl smazán', 'success');
        $this->redirect('this');
    }
}
