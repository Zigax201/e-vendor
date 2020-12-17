<template>
    <div class="mx-8">
        <h1 class="my-4 text-xl">Your Cart</h1>
        <div class="flex flex-wrap">
            <div class="left flex-1 flex">
                <div class="product w-60 border rounded p-2 mr-2">
                    <img src="https://via.placeholder.com/150" class="w-60 object-cover" alt srcset />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div>
                    <p class="text-gray-600">Quantity</p>
                    <div class="flex justify-between bg-gray-200 rounded overflow-hidden">
                        <button class="py-2 px-4 bg-gray-300 focus:outline-none hover:bg-blue-200">-</button>
                        <p class="py-2 px-4 text-blue-900">10</p>
                        <button class="py-2 px-4 bg-gray-300 focus:outline-none hover:bg-blue-200">+</button>
                    </div>

                    <p class="text-gray-600 mt-6">Total</p>
                    <p class="text-gray-700 text-xl">IDR. 100.000</p>
                </div>
            </div>
            <div class="flex-1">
                <input
                    type="text"
                    class="outline-none border w-full p-4"
                    placeholder="shipping address"
                />
                <p class="my-4 text-xl">Payment Details</p>
                <table class="w-full border">
                    <tr>
                        <td class="text-gray-500 px-4 pt-4">Items (3)</td>
                        <td class="px-4 pt-4 text-right">100.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500 px-4">Shipping</td>
                        <td class="px-4 text-right">40.000</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500 px-4">Tax</td>
                        <td class="px-4 text-right">25.000</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 pb-4">Total Price</td>
                        <td class="font-semibold text-blue-900 px-4 text-right">175.000</td>
                    </tr>
                </table>
                <a
                    href="#"
                    class="block w-full px-2 py-4 bg-blue-500 text-center rounded text-white mt-8"
                >Checkout</a>
            </div>
        </div>
    </div>
</template>