<?php

namespace App\Livewire;


use App\Traits\Admin\Alerts;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\HasMedia;


class FileUploader extends Component
{
    use WithFileUploads;
    use Alerts;


    public string $collectionName = 'default';


    public ?TemporaryUploadedFile $file = null;


    public HasMedia $model;


    public bool $singleFile = true;


    public string $route;

    public function deletePhoto(): void
    {
        try {
            $this->model->clearMediaCollection($this->collectionName);

            $this->alertSuccess('Zdjęcie zostało usunięte pomyślnie!');
        } catch (Exception $e) {
            $this->alertError('Wystąpił błąd podczas usuwania zdjęcia. ' . $e->getMessage());
        } finally {
            $this->reset('file');

            $this->redirect($this->route, true);
        }
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.file-uploader');
    }


    public function updatedFile(): void
    {
        $this->validate(['file' => ['required', 'image', 'max:2048']]);

        try {
            if ($this->singleFile) {
                $this->model->clearMediaCollection($this->collectionName);
            }

            $this->model->addMedia($this->file->getRealPath())->toMediaCollection($this->collectionName);

            $this->alertSuccess('Plik został przesłany pomyślnie!');
        } catch (Exception $e) {
            $this->alertError('Wystąpił błąd podczas przesyłania pliku. ' . $e->getMessage());
        } finally {
            $this->reset('file');

            $this->redirect($this->route, true);
        }
    }
}
