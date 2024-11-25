<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
    <title>Alpine</title>
</head>
<body>
    <h2>Hello there</h2>
    <h1>{{$title}}</h1>
{{--    <div x-data="{ message: 'Hello there', date: '23-11-2024' }">--}}
    <div x-data="data">

    <p x-text="message"></p>
        <p x-text="date"></p>

    <button class="px-4 py-1  bg-blue-700 text-white rounded-xl" @click="date='24 november,2024'">Click Me</button>
    </div>
    <div x-data="data1">
        <button class="px-4 py-1 text-xs bg-blue-500" @click="open=true">Open</button>
        <button class="px-4 py-1 text-xs bg-red-700" @click="open=false">Close</button>
        <button class="px-4 py-1 text-xs bg-green-600" @click="open =! open">Toggle</button>
        <button class="px-4 py-1 text-xs bg-green-600" @click="toggle()">Toggle using function</button>
        <div x-show="open" x-transition class="h-[200px] w-[300px] bg-amber-100 text-sm">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci asperiores assumenda consequatur dolor laudantium nam obcaecati perspiciatis quisquam voluptatibus?</p>
        </div>

    </div>

    <script>
        const data = {
            message: 'Hello there Tahasin',
            date: '23-11-2024'
        }
        const data1 = {
            open: false,
            toggle(){
                this.open = !this.open;
            }
        }
    </script>
</body>
</html>
