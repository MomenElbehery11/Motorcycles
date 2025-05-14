<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="d1"><a href="{{route('image.form')}}" role="button">ادخل صورة الدراجة النارية</a></div>
<h1 class="d2"><a href="{{route('prof.index',auth()->user()->id)}}" role="button"class="button-red-outline ">الصفحة الشخصية</a></h1>
@auth
    @if(auth()->user()->role == 'admin')
        <div class="d2">
            <a href="{{ route('adminpage') }}" role="button">للادمن فقط</a>
        </div>
    @endif
@endauth


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
    }
    .d2{
        text-align: center;
    }
    a {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  text-align: center;
  text-decoration: none;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s;
  cursor: pointer;
}

a:hover {
  background-color: #45a049;
}
</style>
