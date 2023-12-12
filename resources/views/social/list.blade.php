<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Social Network') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               @livewire('list-social')
            </div>
        </div>
    </div>
</x-app-layout>




<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
                <x-nav-link href="{{ route('portfolio') }}" class="me-4" :active="request()->routeIs('portfolio')">
                    {{ __('Profil') }}
                </x-nav-link>          
         </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('social') }}" class="me-4 " :active="request()->routeIs('social')">
                {{ __('Social Network') }}
            </x-nav-link>   
         </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('about') }}" class="me-4"  :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-nav-link>           
         </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('skill') }}" class="me-4"  :active="request()->routeIs('skill')">
                {{ __('Skills') }}
            </x-nav-link>
          </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('sumary') }}" class="me-4" :active="request()->routeIs('sumary')">
                {{ __('Sumary') }}
            </x-nav-link>
          </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('education') }}" class="me-4" :active="request()->routeIs('education')">
                {{ __('Education') }}
            </x-nav-link>
          </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('experience') }}" class="me-4" :active="request()->routeIs('experience')">
                {{ __('Experience') }}
            </x-nav-link>          
          </li>

          <li class="nav-item">
             <x-nav-link href="{{ route('mission') }}" class="me-4" :active="request()->routeIs('mission')">
                        {{ __('Mission') }}
             </x-nav-link>         
          </li>
          <li class="nav-item">
            <x-nav-link href="{{ route('project') }}" class="me-4" :active="request()->routeIs('project')">
                {{ __('Project') }}
            </x-nav-link>        
          </li>

          <li class="nav-item">
            <x-nav-link href="{{ route('service') }}" class="me-4" :active="request()->routeIs('service')">
                {{ __('Service') }}
            </x-nav-link>

          </li>

          <li class="nav-item">
             <x-nav-link href="{{ route('testimonial') }}" class="me-4" :active="request()->routeIs('testimonial')">
                    {{ __('Testimonial') }}
             </x-nav-link>

          </li>

          <li class="nav-item">
             <x-nav-link href="{{ route('contact') }}" class="me-4" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
            </x-nav-link>

          </li>

          <li class="nav-item">
             <x-nav-link href="{{ route('message') }}" class="me-4" :active="request()->routeIs('message')">
                        {{ __('Message') }}
                    </x-nav-link>

          </li>



        </ul>
      </div>
    </div>
  </nav>