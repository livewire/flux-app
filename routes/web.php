<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'test')->name('test');
Volt::route('/feed', 'feed');
