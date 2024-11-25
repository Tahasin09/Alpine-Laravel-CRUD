<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    <div x-data="data">
        <form @submit.prevent class="m-10">
            <div class="grid grid-cols-3 gap-4 w-full">
                <input x-model="name" type="text" class="border px-2 py-2 font-thin text-black text-xs rounded"
                    placeholder="Name">
                <input x-model="description" type="text"
                    class="border px-2 py-2 font-thin text-black text-xs rounded" placeholder="Description">
                <input x-model="price" type="number" class="border px-2 py-2 font-thin text-black text-xs rounded"
                    placeholder="Price">

            </div>
            <button @click="saveProduct()"
                class="mt-5 bg-blue-600 text-gray-50 text-xs px-3 py-1 rounded-sm hover:bg-blue-800"
                type="submit">Submit</button>
        </form>
        <div class="m-10">
            <table class="w-full table-auto">
                <thead class="bg-gray-100 text-left text-sm font-thin">
                    <tr>
                        <th class="p-3 px-5">
                            <input class="hover:cursor-pointer" type="checkbox" id="selectAll" />
                        </th>
                        <th class="px-5 py-3">ID</th>
                        <th class="px-5 py-3">Name</th>
                        <th class="px-5 py-3">Description</th>
                        <th class="px-5 py-3">Price</th>
                        <th class="px-5 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="product in products" :key="product.id">
                        <tr class="border-b text-sm font-light text-gray-500">
                            <td class="px-5 py-2"><input type="checkbox" :id="'checkbox-' + product.id" /></td>
                            <td class="px-5 py-2" x-text="product.id"></td>
                            <td class="px-5 py-2" x-text="product.name"></td>
                            <td class="px-5 py-2" x-text="product.description"></td>
                            <td class="px-5 py-2" x-text="product.price"></td>
                            <td class="px-5 py-2">

                                    <button type="submit" @click="edit(product)"
                                        class="rounded-sm bg-yellow-300 px-2 font-medium text-gray-800 hover:text-violet-700">Edit</button>


                                    <button type="submit" @click="deleteProduct(product.id)"
                                        class="rounded-sm bg-red-300 px-2 font-medium text-gray-800 hover:text-violet-700">Delete</button>

                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-50">
            <div class="relative h-[350px] w-[400px] rounded-md bg-gray-50 px-10 py-5">
                <h2 class="mb-6 font-semibold text-gray-800">Edit Product Form</h2>
                <form @submit.prevent action="#">
                    <div class="grid gap-1">
                        <!-- Name Input -->
                        <label class="text-sm font-semibold text-gray-800" for="product-name">Name</label>
                        <input x-model="editProduct.name" id="product-name" class="rounded-md border border-gray-300 px-2 py-1 text-sm font-normal text-gray-800 outline-none" type="text" />

                        <!-- Description Textarea -->
                        <label class="text-sm font-semibold text-gray-800" for="product-description">Description</label>
                        <textarea x-model="editProduct.description" id="product-description" class="rounded-md border border-gray-300 px-2 py-1 text-sm font-normal text-gray-800 outline-none"></textarea>

                        <!-- Price Input -->
                        <label class="text-sm font-semibold text-gray-800" for="product-price">Price</label>
                        <input x-model="editProduct.price" id="product-price" class="rounded-md border border-gray-300 px-2 py-1 text-sm font-normal text-gray-800 outline-none" type="number" />
                    </div>

                    <div class="mt-4 flex justify-end gap-2">
                        <button @click="updateProduct(editProduct)" class="rounded-md bg-blue-600 px-3 py-1 text-xs text-white">Save</button>
                        <button @click="open=false" type="button" class="rounded-md bg-red-600 px-3 py-1 text-xs text-white" >Close</button>
                    </div>
                </form>
            </div>
        </div>

    </div>




    <script>
        const data = {
            products: @json($products),
            name: '',
            description: '',
            price: '',
            open: false,
            editProduct:{
                id:'',
                name: '',
                description: '',
                price: ''
            },
            saveProduct() {
                // console.log(this.price)
                axios.post('/products', {
                    name: this.name,
                    description: this.description,
                    price: this.price
                }).then(response => {
                    alert(response.data.message)
                    this.products.push(response.data.product)
                })
            },
            fetchProducts() {
                axios.get('/products')
                    .then(response => {
                        this.products = response.data
                    })
            },
            deleteProduct(id){
                if(confirm('Are you sure?')){
                    axios.delete(`/products/${id}`)
                        .then(response=>{
                            this.fetchProducts()
                        })
                }

            },
            edit(product){
                this.editProduct = {...product}
                this.open = true
            },
            updateProduct(product){
                axios.put(`/products/${this.editProduct.id}`,this.editProduct)
                    .then(response=>{
                        alert(response.data.message)
                        this.open = false
                        this.fetchProducts()
                    })

            }
        }
    </script>
</body>

</html>
