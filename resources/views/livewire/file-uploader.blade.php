@php
  $url = $model->hasMedia($collectionName) ? $model->getFirstMediaUrl($collectionName, 'thumbnail') : null;
@endphp
<div x-data="{ isDropping: false, isUploading: false, progress: 0 }" class="relative w-fit">
  <form wire:submit="uploadFile">
    @if($url)
      <label for="file-upload"
        class="min-h-[100px] min-[100px] border relative inline-block overflow-hidden
        border-gray-300 dark:border-gray-700 cursor-pointer rounded-xl dark:bg-gray-900 dark:text-gray-300
        focus:border-indigo-500 hover:border-indigo-500"
        title="{{ __('global.chosePhoto') }}"
      >
        <a wire:click.prevent="deletePhoto" title="{{ __('global.deletePhoto') }}" class="cursor-pointer absolute top-2 right-2 bg-[#262626cc] text-white px-4 py-2 hover:bg-red-600 select-none rounded-lg">X</a>
        <img src="{{ $url }}" alt="image" />
        <div class="bg-[#262626cc] rounded-xl flex flex-col items-center justify-center p-4
          absolute top-[50%] bottom-[50%] left-[50%] right-[50%] w-fit h-fit translate-x-[-50%] translate-y-[-50%] text-nowrap">
          <h3 class="text-2xl select-none ">{{ __('global.clickToUpload') }}</h3>
        </div>
      </label>
    @else
      <label
        class="h-[300px] w-[300px] flex flex-col items-center justify-center border relative
        border-gray-300 dark:border-gray-700 cursor-pointer rounded-xl dark:bg-gray-900 dark:text-gray-300
        focus:border-indigo-500 hover:border-indigo-500"
        for="file-upload"
      >
        <div class="bg-[#262626cc] rounded-xl flex flex-col items-center justify-center p-2">
          <h3 class="text-xl select-none ">{{ __('global.clickToUpload') }}</h3>
        </div>
      </label>
    @endif
    <input
      type="file"
      wire:model="file"
      id="file-upload"
      @if(!$singleFile) multiple @endif
    class="hidden"
      x-bind:disabled="isUploading"
      accept="image/*"
    />
  </form>

</div>
