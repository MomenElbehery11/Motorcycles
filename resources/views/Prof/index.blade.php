<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">
        تسجيل الخروج
    </button>
</form>

<div class="d1" >
    <a href="{{route('image.form')}}" role="button" style="color:white">ادخل صورة الدراجة النارية</a>
    @if($user->profile)
        <h1>مرحبا, {{$user->profile->name}}</h1>
        <h2>{{$user->email}}</h2>
        <h2>الهاتف: {{$user->profile->phone}}</h2>
        <h2>رقم الهوية الوطنية : {{$user->profile->info}}</h2>
    @else
        <h1>مرحبا, {{$user->email}}</h1>
        <h2>لا يوجد بيانات شخصية بعد.</h2>
        <h2><a href="{{ route('prof.create', $user->id) }}">قم بإدخال بياناتك الشخصية</a></h2>
    @endif

    <h1 class="a1"><a href="{{route('images.index')}}" role="button"> جميع المنتجات</a></h1>
</div>

<h1 class="a1"><a href="{{route('prof.create', auth()->user()->id)}}" role="button"> تعديل البيانات الشخصية </a></h1>
@auth
    @if(auth()->user()->role == 'admin')
        <div class="d2">
            <a href="{{ route('adminpage') }}" role="button">للادمن فقط</a>
        </div>
    @endif
@endauth

<style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
        }

        body {
            background-image: url('{{ asset('images/backg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            backdrop-filter: brightness(0.6);
        }

        .d1 {
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.6);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        h1, h2 {
            margin: 10px 0;
        }

        .a1 a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #1e90ff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .a1 a:hover {
            background-color: #0d74d1;
            transform: scale(1.05);
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

  .btn-danger {
    background: linear-gradient(135deg, #ff416c, #ff4b2b);
    border: none;
    padding: 12px 28px;
    color: white;
    font-weight: 600;
    font-size: 16px;
    border-radius: 30px;
    box-shadow: 0 4px 15px rgba(255, 75, 43, 0.4);
    cursor: pointer;
    transition: background 0.3s ease, box-shadow 0.3s ease;
    user-select: none;
}

.btn-danger:hover {
    background: linear-gradient(135deg, #ff4b2b, #ff416c);
    box-shadow: 0 6px 20px rgba(255, 75, 43, 0.6);
}

.btn-danger:active {
    transform: scale(0.95);
    box-shadow: 0 3px 10px rgba(255, 75, 43, 0.4);
}

</style>

    </style>