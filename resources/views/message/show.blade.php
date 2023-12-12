<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
       
               
                @livewire('show-message',['message'=>$message])

         
    </div>
</x-app-layout>




