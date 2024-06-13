<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="d1"><a href="{{route('image.form')}}" role="button">ادخل صورة الدراجة النارية</a></div>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    .d1{
        text-align: center;
        background: red;
    }
    .d2{
        text-align: center;
        background: green;
    }

</style>
