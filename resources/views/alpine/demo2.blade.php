<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
    <title>Alpine 2</title>
</head>
<body>
<h2>Hello there</h2>
<h1>{{$title}}</h1>

<div x-data="person" class="w-[300px]">
    <p x-text="name" class="m-4 text-sm  bg-gray-500 text-gray-300 rounded-xl p-2"></p>
    <p x-text="email" class="m-4 text-sm  bg-gray-500 text-gray-300 rounded-xl p-2"></p>
    <p x-text="age" class="m-4 text-sm  bg-gray-500 text-gray-300 rounded-xl p-2"></p>
    <hr>
    <input type="text" x-model="name" class="m-4 text-sm border border-gray-400 text-gray-700 rounded-xl p-2"><br>
    <input type="text" x-model="email" class="m-4 text-sm border border-gray-400 text-gray-700 rounded-xl p-2"><br>
    <input type="text" x-model="age" class="m-4 text-sm border border-gray-400 text-gray-700 rounded-xl p-2"><br>



    {{--    <button class="px-4 py-1  bg-blue-700 text-white rounded-xl" @click="date='24 november,2024'">Click Me</button>--}}
</div>
<div x-data="data">
    <ul>
        <template x-for="person,index in persons" :key="index">
            <li x-text="person.name"></li>
            <li x-text="person.email"></li>
            <li x-text="person.age"></li><br>
        </template>
    </ul>
</div>


<script>
    const person = {
        name: 'Yulad Hassan',
        email: 'yulad@gmail.com',
        age: 30

    }
    const data = {
        persons : [
            {name:'Abdul Hakim',age:23, email:'hakim@gmail.com'},
            {name:'Jashim Mistri',age:23, email:'jashim@gmail.com'},
            {name:'Kalu Jalal',age:23, email:'kalu@gmail.com'}

        ]
    };
</script>
</body>
</html>

